<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum PaymentTypeEnum: string implements HasLabel
{
    case InFull = 'in_full';
    case InInstallments = 'in_installments';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::InFull => __('lawsuit.payment_type_in_full'),
            self::InInstallments => __('lawsuit.payment_type_in_installments')
        };
    }
}
