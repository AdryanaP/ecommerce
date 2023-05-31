<?php

namespace App\Enums;

enum OrderStatus
{
    const CREATED = 'pedido realizado';
    const WAITING_PAYMENT = 'aguardando pagamento';
    const PROCESSING_PAYMENT = 'processando pagamento';
    const PAYMENT_CANCELED = 'pagamento cancelado';
    const PAYMENT_DECLINED = 'pagamento recusado';
    const PAYMENT_CAPTURED = 'pagamento aprovado';
}
