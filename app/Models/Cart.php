<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Cart extends Model
{
    protected $table = 'tblcarts';
    protected $fillable = ['user_id', 'product_type', 'product_id', 'quantity'];

    public function items()
    {
        return $this->hasMany(CartItem::class, 'cart_id');
    }

    public function getProduct()
    {
        if ($this->product_type === 'tblcomputer') {
            return \App\Models\Computer::find($this->product_id);
        } elseif ($this->product_type === 'tblaccessary') {
            return \App\Models\Accessary::find($this->accessary_id);
        }

        return null;
    }
}
