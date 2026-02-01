<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessary extends Model
{
    protected $table = 'tblaccessary';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'price', 'description', 'image', 'category'];

    use HasFactory;
}
