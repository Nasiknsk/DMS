<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'office_name',
        'department',
        'section',
        'address',
        'office_mail',
        'office_phoe',
        'incharge',
        'phone1',
        'phone2',
        'email',

    ];
}
