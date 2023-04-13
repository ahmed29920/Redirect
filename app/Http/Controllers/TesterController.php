<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Admin;
use App\Models\User;
use App\Models\Tester;
use App\Models\Commissary;
class TesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testers = Tester::all();
        return view('testers\index' , ['testers' => $testers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('testers\create');
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
        $attributes['role'] = 'Tester';
        $user = User::create($attributes);
        Tester::create(['user_id' => $user->id]);
        session()->flash('success', 'Tester created successfully');
        return redirect('testers');
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
    public function edit(Tester $tester)
    {
        return view('testers/create', [ 'tester' => $tester]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Tester $tester)
    {
        $data = $request->only(['name', 'email', 'phone', 'role']);
        $user = User::where('id' , $tester->user_id)->get();
        if ($request->role != 'Tester') {
            $tester->delete();
            switch ($request->role) {
                case 'Admin':
                    Admin::create(['user_id' => $user[0]->id]);
                    break;
                case 'Client':
                    Client::create(['user_id' => $user[0]->id]);
                    break;
                case 'Commissary':
                    Commissary::create(['user_id' => $user[0]->id]);
                    break;        
            } 
        }
        
        $user[0]->update($data);
        return redirect('/testers')->with('success','Testers updated successfully');
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


    public function removeTester(Request $request)
    {
        $id = $request->input('userid');
        $teste = Tester::where('id' , $id)->first();
        $user = User::where('id' , $teste->user_id)->get();
        Tester::destroy($id);
        $user[0]->delete();
        return redirect()->back();
    }
}
