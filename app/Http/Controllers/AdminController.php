<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Admin;
use App\Models\User;
use App\Models\Tester;
use App\Models\Commissary;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::all();
        return view('admins\index' , ['admins' => $admins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins\create');
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
        $attributes['role'] = 'Admin';
        $user = User::create($attributes);
        Admin::create(['user_id' => $user->id]);
        session()->flash('success', 'Admin created successfully');
        return redirect('admins');
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
    public function edit(Admin $admin)
    {
        return view('admins/create', [ 'admin' => $admin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $data = $request->only(['name', 'email', 'phone', 'role']);
        $user = User::where('id' , $admin->user_id)->get();
        if ($request->role != 'Admin') {
            $admin->delete();
            switch ($request->role) {
                case 'Client':
                    Client::create(['user_id' => $user[0]->id]);
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
        return redirect('/admins')->with('success','Admin updated successfully');
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

    public function removeAdmin(Request $request)
    {
        $id = $request->input('userid');
        $admin = Admin::where('id' , $id)->first();
        $user = User::where('id' , $admin->user_id)->get();
        Admin::destroy($id);
        $user[0]->delete();
        return redirect()->back();
    }

}
