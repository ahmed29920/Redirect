<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view('session.register');
    }

    public function store(Request $request )
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:50', Rule::unique('users', 'email')],
            'password' => ['required', 'min:5', 'max:20'],
            'phone' => ['required', 'min:10', 'max:12'],
            'agreement' => ['accepted']
        ]);
        $attributes['password'] = bcrypt($attributes['password'] );

        

        session()->flash('success', 'Your account has been created.');
        $user = User::create($attributes);
        // to add client
        $new_user = User::where('email' , $request['email'])->get();
        $client = ['user_id' => $new_user[0]->id] ;
        Client::create($client);
        Auth::login($user); 
        return redirect('/dashboard');
    }
}
