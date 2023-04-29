<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use App\Models\Admin;
use App\Models\Tester;
use App\Models\Commissary;
use App\Models\Hospital;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users\index' , ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users\create');
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
        $attributes['role'] = $request->role;
        $user = User::create($attributes);
        switch ($request->role) {
            case 'Client':
                Client::create(['user_id' => $user->id]);
                break;
            case 'Tester':
                Tester::create(['user_id' => $user->id]);
                break;
            case 'Commissary':
                Commissary::create(['user_id' => $user->id]);
                break; 
            case 'Admin':
                Admin::create(['user_id' => $user->id]);
                break;            
        }
        session()->flash('success', 'Admin created successfully');
        return redirect('users');
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
    public function edit(User $user)
    {
        return view('users/create', [ 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->only(['name', 'email', 'phone', 'role']);
        if($user->role == 'Client'){
            // check if he cange the role from clinet to onther role if true -> delete from clients table
            $client = Client::where('user_id' , $user->id);
            if ($request->role != 'Client') {
                $client->delete();
                switch ($request->role) {
                    case 'Admin':
                        Admin::create(['user_id' => $user->id]);
                        break;
                    case 'Tester':
                        Tester::create(['user_id' => $user->id]);
                        break;
                    case 'Commissary':
                        Commissary::create(['user_id' => $user->id]);
                        break;        
                }
            }
            
        }elseif($user->role == 'Admin') {
            // check if he cange the role from admin to onther role if true -> delete from admins table
            $admin = Admin::where('user_id' , $user->id);
            if ($request->role != 'Admin') {
                $admin->delete();
                switch ($request->role) {
                    case 'Client':
                        Client::create(['user_id' => $user->id]);
                        break;
                    case 'Tester':
                        Tester::create(['user_id' => $user->id]);
                        break;
                    case 'Commissary':
                        Commissary::create(['user_id' => $user->id]);
                        break;        
                }
            }
        }elseif ($user->role == 'Tester') {
            // check if he cange the role from tester to onther role if true -> delete from testers table
            $tester = Tester::where('user_id' , $user->id);
            if ($request->role != 'Tester') {
                $tester->delete();
                switch ($request->role) {
                    case 'Admin':
                        Admin::create(['user_id' => $user->id]);
                        break;
                    case 'Client':
                        Client::create(['user_id' => $user->id]);
                        break;
                    case 'Commissary':
                        Commissary::create(['user_id' => $user->id]);
                        break;        
                }
                
            }
        }elseif ($user->role == 'Commissary') {
            // check if he cange the role from commissary to onther role if true -> delete from commissaries table
            $commissary = Commissary::where('user_id' , $user->id);
            if ($request->role != 'Commissary') {
                $commissary->delete();
                switch ($request->role) {
                    case 'Admin':
                        Admin::create(['user_id' => $user->id]);
                        break;
                    case 'Tester':
                        Tester::create(['user_id' => $user->id]);
                        break;
                    case 'Client':
                        Client::create(['user_id' => $user->id]);
                        break;        
                }
            }
        }elseif($user->role == 'Hospital'){
            // check if he cange the role from hospital to onther role if true -> delete from hospitals table
            $hospital = Hospital::where('user_id' , $user->id);
            if ($request->role != 'Hospital') {
                $hospital->delete();
            }
        }
        $user->update($data);
        return redirect('/users')->with('success','User updated successfully');
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
