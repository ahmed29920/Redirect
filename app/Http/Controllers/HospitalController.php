<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Bank;
use App\Models\User;
use App\Models\Tester;
use App\Models\Commissary;
use App\Models\Client;
use App\Models\Hospital;
class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospitals = Hospital::all();
        return view('hospital\index' , ['hospitals' => $hospitals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hospital\create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:50', Rule::unique('users', 'email')],
            'password' => ['required', 'min:5', 'max:20'],
            'phone' => ['required', 'min:10', 'max:12'],
        ]);
        $attributes['password'] = bcrypt($attributes['password'] );
        $attributes['role'] = 'Hospital';
        $user = User::create($attributes);
        $hospital  = Hospital::create(['user_id' => $user->id , 'location' => $request->address]);
        
        Bank::create(['hospital_id' => $hospital->id , 'amount' => 0 , 'type' => 'A+' ]);
        Bank::create(['hospital_id' => $hospital->id , 'amount' => 0 , 'type' => 'B+' ]);
        Bank::create(['hospital_id' => $hospital->id , 'amount' => 0 , 'type' => 'O+' ]);
        Bank::create(['hospital_id' => $hospital->id , 'amount' => 0 , 'type' => 'AB+' ]);
        Bank::create(['hospital_id' => $hospital->id , 'amount' => 0 , 'type' => 'A-' ]);
        Bank::create(['hospital_id' => $hospital->id , 'amount' => 0 , 'type' => 'B-' ]);
        Bank::create(['hospital_id' => $hospital->id , 'amount' => 0 , 'type' => 'AB-' ]);
        Bank::create(['hospital_id' => $hospital->id , 'amount' => 0 , 'type' => 'O-' ]);
        session()->flash('success', 'Hospital created successfully');
        return redirect('Hospital');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Hospital $hospital)
    {
        return view('hospital/create', [ 'hospital' => $hospital]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hospital $hospital)
    {
        $data = $request->only(['name', 'email', 'phone']);
        $user = User::where('id' , $hospital->user_id)->get();
        $user[0]->update($data);
        $hospital->update(['address' => $request->address]);
        return redirect('/hospitals')->with('success','Hospital updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
