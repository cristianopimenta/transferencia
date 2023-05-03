<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'numero_conta',
        'saldo_conta_positivo',
        'saldo_conta_negativo',
        'saldo_conta',
    ];
}
