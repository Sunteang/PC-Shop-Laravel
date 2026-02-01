<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepairRequest extends Model
{
    use HasFactory;

    protected $table = 'tblrepair_requests';
    protected $fillable = [
        'name',
        'email',
        'device_type',
        'issue_description',
        'photo_path',
        'status',
    ];
}
