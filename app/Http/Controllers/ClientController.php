<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Admin;
use App\Models\User;
use App\Models\Tester;
use App\Models\Commissary;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view('clients\index' , ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients\create');
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
        $attributes['role'] = 'Client';
        $user = User::create($attributes);
        Client::create(['user_id' => $user->id]);
        session()->flash('success', 'Client created successfully');
        return redirect('clients');
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
    public function edit(Client $client)
    {
        return view('clients/create', [ 'client' => $client]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $data = $request->only(['name', 'email', 'phone', 'role']);
        $user = User::where('id' , $client->user_id)->get();
        if ($request->role != 'Client') {
            $client->delete();
            switch ($request->role) {
                case 'Admin':
                    Admin::create(['user_id' => $user[0]->id]);
                    break;
                case 'Tester':
                    Tester::create(['user_id' => $user[0]->id]);
                    break;
                case 'Commissary':
                    Commissary::create(['user_id' => $user[0]->id]);
                    break;        
            }
        }
        
        $user[0]->update($data);
        return redirect('/clients')->with('success','Client updated successfully');
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

    public function removeClient(Request $request)
    {
        $id = $request->input('userid');
        $client = Client::where('id' , $id)->first();
        $user = User::where('id' , $client->user_id)->get();
        Client::destroy($id);
        $user[0]->delete();
        return redirect()->back();
    }
}
