<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $fillable = [
        'hospital_id',
        'A+',
        'A-',
        'B+',
        'B-',
        'AB-',
        'AB+',
        'O-',
        'O+',
    ];
}
