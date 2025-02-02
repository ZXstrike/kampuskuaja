<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'semester',
        'gpa',
        'choice',
        'file',
        'status',
    ];
}
