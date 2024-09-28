<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $fillable = ['email', 'user_type', 'first_name', 'last_name', 'phone_no', 'address', 'address_1', 'city', 'postcode'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }
}
