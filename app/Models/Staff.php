<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staffs';
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'nic',
        'phone',
        'status',
    ];
    protected $casts = [
        'code' => 'string', // Assuming 'nic' is a string field
        'phone' => 'string', // Assuming 'phone' is a string field
        'status' => 'integer', // Assuming 'phone' is a string field
    ];
}
