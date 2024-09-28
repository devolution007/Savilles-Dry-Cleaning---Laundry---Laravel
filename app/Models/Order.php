<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['collection_date', 'collection_time', 'delivery_date', 'delivery_time', 'instruction', 'infomation', 'frequency'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function sections()
    {
        return $this->hasMany(OrderSection::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    // public function customer()
    // {
    //     return $this->belongsTo(Customer::class, 'customer_id');
    // }
}
