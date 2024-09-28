<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['charge_id', 'transaction_id', 'customer', 'amount', 'currency', 'payment_method', 'status'];
}
