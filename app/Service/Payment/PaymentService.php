<?php

namespace App\Service\Payment;

use App\Enums\OrderStatus;
use App\Enums\PaymentStatus;
use App\Models\Order;
use Darryldecode\Cart\CartCollection;
use Illuminate\Support\Facades\Http;

class PaymentService
{
    public function generateOrder(
        $customerId,
        $customerName,
        $customerDocument,
        $customerEmail,
        $customerIp,
        $type,
        $tax,
        $subtotal,
        $total,
    ) {
        return Order::create([
            'status' => OrderStatus::CREATED,
            'customer_id' => $customerId,
            'customer_name' => $customerName,
            'customer_document' => $customerDocument,
            'customer_email' => $customerEmail,
            'customer_ip' => $customerIp,
            'type' => $type,
            'tax' => $tax,
            'subtotal' => $subtotal,
            'total' => $total,
        ]);
    }

    public function attachProducts(Order $order, CartCollection $cartItems): void
    {
        collect($cartItems)->each(function ($item) use ($order) {
            $order->products()->attach(
                $item->id,
                [
                    'price' => $item->price,
                    'quantity' => $item->quantity,
                ]
            );
        });
    }

    public function attachCardAction(
        Order $order,
        $cardName,
        $cardNumber,
        $cardMonth,
        $cardYear,
        $cardCvv,
        $cardInstallments,
    ) {
        $database = $order->payment_action()->create([
            'type' => 'card',
            'amount' => $order->total,
            'status' => PaymentStatus::CREATED,
        ]);

        if (!$database->id) {
            return;
        }

        $provider = Http::withBasicAuth(
            config('services.ipag.username'),
            config('services.ipag.password')
        )
            ->post(
                config('services.ipag.endpoint') . '/service/resources/card_tokens',
                [
                    'card' => [
                        'holderName' => $cardName,
                        'number' => $cardNumber,
                        'expiryMonth' => $cardMonth,
                        'expiryYear' => $cardYear,
                        'cvv' => $cardCvv
                    ],
                    'holder' => [
                        'name' => $order->customer_name,
                        'cpfCnpj' => $order->customer_document,
                        'mobilePhone' => $order->customer->cellphone,
                        'birthdate' => date('Y-m-d', strtotime($order->customer->birthdate)),
                        'address' => [
                            'street' => $order->shipping->street,
                            'number' => $order->shipping->number,
                            'district' => $order->shipping->district,
                            'complement' => $order->shipping->complement,
                            'city' => $order->shipping->city,
                            'state' => $order->shipping->state,
                            'zipcode' => $order->shipping->zipcode
                        ]
                    ]
                ]
            );;

        if ($provider->json('token')) {
            $database->update([
                'card_token' => $provider->json('token'),
                'card_token_validated_at' => $provider->json('attributes.validated_at'),
                'card_token_expires_at' => $provider->json('attributes.expires_at'),
                'card_is_active' => $provider->json('attributes.card.is_active'),
                'card_holder' => $provider->json('attributes.card.holder'),
                'card_bin' => $provider->json('attributes.card.bin'),
                'card_last4' => $provider->json('attributes.card.last4'),
                'card_brand' => $provider->json('attributes.card.brand'),
                'card_installments' => $cardInstallments,
                'status' => PaymentStatus::PROCESSING
            ]);

            $order->update([
                'status' => OrderStatus::PROCESSING_PAYMENT
            ]);
        } else {
            $database->update([
                'status' => PaymentStatus::CANCELED,
            ]);
        }

        return $database;
    }

    public function attachPixAction(Order $order)
    {
        $database = $order->payment_action()->create([
            'type' => $order->type,
            'amount' => $order->total,
            'status' => PaymentStatus::CREATED,
        ]);

        if (!$database->id) {
            return;
        }

        $provider = Http::withBasicAuth(
            config('services.ipag.username'),
            config('services.ipag.password')
        )
            ->withHeaders([
                'x-api-version' => 2
            ])
            ->post(
                config('services.ipag.endpoint') . '/service/payment',
                [
                    'amount' => $order->total,
                    'callback_url' => config('services.ipag.callback_pix'),
                    'order_id' => uniqid(),
                    'payment' => [
                        'type' => 'pix',
                        'method' => 'pix',
                        'pix_expires_in' => 60
                    ],
                    'customer' => [
                        'name' => $order->customer_name,
                        'cpf_cnpj' => $order->customer_document,
                        'email' => $order->customer_email,
                        'ip' => $order->customer_ip,
                        'billing_address' => [
                            'street' => $order->shipping->street,
                            'number' => $order->shipping->number,
                            'district' => $order->shipping->district,
                            'complement' => $order->shipping->complement,
                            'city' => $order->shipping->city,
                            'state' => $order->shipping->state,
                            'zipcode' => $order->shipping->zipcode
                        ]
                    ],
                ]
            );;

        if ($provider->json('id')) {
            $database->update([
                'provider_id' => $provider->json('id'),
                'pix_qrcode' => $provider->json('attributes.pix.qrcode'),
                'pix_expires_in' => 60,
                'status' => PaymentStatus::WAITING
            ]);
        } else {
            $database->update([
                'status' => PaymentStatus::CANCELED
            ]);
        }

        return $database;
    }

    public function attachBoletoAction(
        Order $order
    ) {
        $database = $order->payment_action()->create([
            'type' => $order->type,
            'amount' => $order->total,
            'status' => PaymentStatus::CREATED,
        ]);

        if (!$database->id) {
            return;
        }

        $provider = Http::withBasicAuth(
            config('services.ipag.username'),
            config('services.ipag.password')
        )
            ->withHeaders([
                'x-api-version' => 2
            ])
            ->post(
                config('services.ipag.endpoint') . '/service/payment',
                [
                    'amount' => $order->total,
                    'callback_url' => config('services.ipag.callback_boleto'),
                    'order_id' => uniqid(),
                    'payment' => [
                        'type' => 'boleto',
                        'method' => 'boletopagseguro',
                        'boleto' => [
                            'due_date' => date('Y-m-d', strtotime('+3 days')),
                            'instructions' => ['Sr. Caixa não receber após o vencimento', "Boleto referente ao pedido {$order->id}"]
                        ]
                    ],
                    'customer' => [
                        'name' => $order->customer_name,
                        'cpf_cnpj' => $order->customer_document,
                        'email' => $order->customer_email,
                        'ip' => $order->customer_ip,
                        'billing_address' => [
                            'street' => $order->shipping->street,
                            'number' => $order->shipping->number,
                            'district' => $order->shipping->district,
                            'complement' => $order->shipping->complement,
                            'city' => $order->shipping->city,
                            'state' => $order->shipping->state,
                            'zipcode' => $order->shipping->zipcode
                        ]
                    ],
                ]
            );;

        if ($provider->json('id')) {
            $database->update([
                'provider_id' => $provider->json('id'),
                'boleto_digitable_line' => $provider->json('attributes.boleto.digitable_line'),
                'boleto_due_date' => $provider->json('attributes.boleto.due_date'),
                'boleto_link' => $provider->json('attributes.boleto.link'),
                'status' => PaymentStatus::WAITING
            ]);
        } else {
            $database->update([
                'status' => PaymentStatus::CANCELED
            ]);
        }

        return $database;
    }
}
