<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePrices extends Model
{
    use HasFactory;

    protected $table = 'service_prices';

    protected $fillable = ['service_id', 'title', 'child'];
}
