<?php

namespace App\Models;

use App\Enums\CourtEnum;
use App\Enums\PaymentTypeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Lawsuit extends Model
{
    use HasUlids;

    protected $fillable = [
        'client_id',
        'case_number',
        'case_type',
        'court',
        'legal_fee',
        'payment_type',
        'due_date',
        'contigency_fee',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'court' => CourtEnum::class,
            'payment_type' => PaymentTypeEnum::class,
        ];
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
