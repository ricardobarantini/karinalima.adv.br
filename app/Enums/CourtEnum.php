<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum CourtEnum: string implements HasLabel
{
    case VC = 'vc';
    case JEC = 'jec';
    case JT = 'jt';
    case TRF = 'trf';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::VC => __('lawsuit.court_vc'),
            self::JEC => __('lawsuit.court_jec'),
            self::JT => __('lawsuit.court_jt'),
            self::TRF => __('lawsuit.court_trf')
        };
    }
}
