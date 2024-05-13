<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'number', 'category_id', 'person_id', 'size', 'description', 'staff_id', 'file_path',
    ];
}
