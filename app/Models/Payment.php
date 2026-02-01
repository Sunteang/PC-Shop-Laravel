<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'tblpayments';
    protected $fillable = [
        'customer_id',
        'amount',
        'method',
        'status',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
