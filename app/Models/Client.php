<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'office_name',
        'department',
        'section',
        'address',
        'office_phone',
        'incharge',
        'incharge_phone',
        'email',
    ];
}
