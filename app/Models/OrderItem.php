<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'tblorder_items';
    protected $fillable = ['order_id', 'item_type', 'item_id', 'price', 'quantity'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function computer()
    {
        return $this->belongsTo(Computer::class, 'item_id');
    }

    public function accessary()
    {
        return $this->belongsTo(Accessary::class, 'item_id');
    }
}
