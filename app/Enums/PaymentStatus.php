<?php

namespace App\Enums;

enum PaymentStatus
{
    const CREATED = 'iniciado';
    const WAITING = 'aguardando pagamento';
    const CANCELED = 'cancelado';
    const IN_ANALISYS = 'em análise';
    const PROCESSING = 'processando';
    const PRE_AUTHORIZED = 'pré-autorizado';
    const PARTIAL_CAPTURED = 'autorizado valor parcial';
    const DECLINED = 'recusado';
    const CAPTURED = 'aprovado e capturado';
    const CHARGEDBACK = 'chargeback';
    const IN_DISPUTE = 'em disputa';
}
