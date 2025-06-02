<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_on_card',
        'card_last_four',
        'amount',
        'payment_status',
        'stripe_payment_id',
    ];
}
