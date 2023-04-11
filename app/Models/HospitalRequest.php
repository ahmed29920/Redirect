<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'type_of_request',
        'way',
        'IsOk',
        'note',
        'client_id',
        'tester_id',
        'commissary_id',
        'hospital_id',
    ];
}
