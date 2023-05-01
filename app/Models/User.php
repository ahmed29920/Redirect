<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Admin;
use App\Models\Tester;
use App\Models\Commissary;
use App\Models\Client;
use App\Models\Hospital;
use App\Models\ClientRequest;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function admin()
    {
        return $this->hasMany(Admin::class);
    }

    public function tester()
    {
        return $this->hasMany(Tester::class);
    }

    public function commissary()
    {
        return $this->hasMany(Commissary::class);
    }

    public function client()
    {
        return $this->hasMany(Client::class);
    }

    public function hospital()
    {
        return $this->hasMany(Hospital::class);
    }


    public function clientRequest()
    {
        return $this->belongsTo(ClientRequest::class , 'client_id' , 'id');
    }
    
}
