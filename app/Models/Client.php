<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Client extends Model
{
    use HasUlids;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'cpf',
    ];
}
