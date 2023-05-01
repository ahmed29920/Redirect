<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Tester;
use App\Models\Commissary;
use App\Models\Hospital;

class ClientRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'serial',
        'code',
        'type_of_blood',
        'amount',
        'state',
        'type_of_request',
        'way',
        'IsOk',
        'note',
        'client_id',
        'tester_id',
        'commissary_id',
        'hospital_id',
    ];



    public function user(){
        return $this->hasOne(User::class , 'id' , 'client_id');
    }
    public function tester(){
        return $this->hasOne(Tester::class , 'id' , 'tester_id');
    }
    public function commissary(){
        return $this->hasOne(Commissary::class , 'id' , 'commissary_id');
    }
    public function hospital(){
        return $this->hasOne(Hospital::class , 'id' , 'hospital_id');
    }
}
