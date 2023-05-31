<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = \Cart::getContent();

        return view('pages.cart', compact('cartItems'));
    }

    public function addToCart(Request $request)
    {
        if (!is_null(\Cart::get($request->id))) {
            \Cart::update(
                $request->id,
                [
                    'quantity' => [
                        'relative' => false,
                        'value' => $request->quantity > $request->maxInStock ? $request->maxInStock : $request->quantity,
                    ],
                ]
            );
        } else {
            \Cart::add([
                'id' => $request->id,
                'name' => $request->name,
                'price' => str_replace(',', '', $request->price),
                'quantity' => $request->quantity > $request->maxInStock ? $request->maxInStock : $request->quantity,
                'attributes' => [
                    'image' => $request->image,
                    'slug' => $request->slug,
                    'sku' => $request->sku,
                    'parentName' => $request->parentName,
                    'maxInStock' => $request->maxInStock,
                    'height' => $request->height,
                    'length' => $request->length,
                    'weight' => $request->weight,
                    'width' => $request->width,
                ],
            ]);
        }

        return response()->json([
            'success' => true,
        ]);
    }

    public function updateCart(Request $request, $item)
    {
        \Cart::update(
            $item,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ]
            ]
        );

        return response()->json(['message' => 'ok']);
    }

    public function removeCart($item)
    {
        \Cart::remove($item);
        return response()->json(['message' => 'ok']);
    }

    public function clearAllCart(Request $request)
    {
        \Cart::clear();
        return redirect()->route('cart.list');
    }

}
