<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'tblorders';
    protected $fillable = [
        'user_id',
        'customer_name',
        'phone_number',
        'shipping_address',
        'payment_method',
        'order_details',
        'total',
    ];


    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
