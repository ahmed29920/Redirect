<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Admin;
use App\Models\User;
use App\Models\Tester;
use App\Models\Commissary;
class CommissaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commissaries = Commissary::all();
        return view('commissaries\index' , ['commissaries' => $commissaries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('commissaries\create');
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
        $attributes['role'] = 'Commissary';
        $user = User::create($attributes);
        Commissary::create(['user_id' => $user->id]);
        session()->flash('success', 'Commissary created successfully');
        return redirect('commissaries');
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
    public function edit(Commissary $commissary)
    {
        return view('commissaries/create', [ 'commissary' => $commissary]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commissary $commissary)
    {
        $data = $request->only(['name', 'email', 'phone', 'role']);
        $user = User::where('id' , $commissary->user_id)->get();
        if ($request->role != 'Commissary') {
            $commissary->delete();
            switch ($request->role) {
                case 'Admin':
                    Admin::create(['user_id' => $user[0]->id]);
                    break;
                case 'Tester':
                    Tester::create(['user_id' => $user[0]->id]);
                    break;
                case 'Client':
                    Client::create(['user_id' => $user[0]->id]);
                    break;        
            }
        }
        
        $user[0]->update($data);
        return redirect('/commissaries')->with('success','Commissary updated successfully');
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

    public function removeCommissary(Request $request)
    {
        $id = $request->input('userid');
        $commissary = Commissary::where('id' , $id)->first();
        $user = User::where('id' , $commissary->user_id)->get();
        Commissary::destroy($id);
        $user[0]->delete();
        return redirect()->back();
    }
}
