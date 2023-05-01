<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Admin;
use App\Models\User;
use App\Models\Tester;
use App\Models\Commissary;
use App\Models\Client;
use App\Models\Bank;
use App\Models\ClientRequest;

class ClientRequestsController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('CheckClient')->except('store')->except('getRequest')->except('donateRequest');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = ClientRequest::all();
        return view('clientRequests\index'  , [ 'requests' => $requests ]);
    }

    public function getRequest()
    {
        return view('clientRequests/get');
    }


    public function donateRequest()
    {
        return view('clientRequests/donate');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if $request->typeOfRequest == 'Donate' then the request is donate request , else the request is get request
        $serial = uniqid(); // public (to check the state of the request)
        $code = uniqid();  // QR code (to validate that the delegator go to the right client)
        $attributes['type_of_request'] = $request->typeOfRequest;
        $attributes['serial'] = $serial;
        $attributes['code'] = $code;
        $attributes['type_of_blood'] = $request->typeOfBlood ;
        $attributes['amount'] = $request->amount;
        $attributes['state'] = 'Pending';
        $attributes['IsOk'] = Null;
        $attributes['note'] = Null;
        $attributes['location'] = $request->location;
        $attributes['client_id'] = Auth()->user()->id;
        $attributes['tester_id'] = Null;
        $attributes['commissary_id'] = Null;
        $attributes['way'] = $request->way;
        if( $request->way == 'Home'){
            $attributes['hospital_id'] = Null;
        }else{
            $attributes['hospital_id'] = $request->hospitalId;
        }
        $NewRequest = ClientRequest::create($attributes);
        return view('clientRequests\serial' , ['NewRequest' => $NewRequest]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $request = ClientRequest::where('id' , $id)->first();
        return view('clientRequests/show' , ['request' => $request]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $commissaries = Commissary::all();
        $testers = Tester::all();
        $request = ClientRequest::where('id' , $id)->first();
        return view('clientRequests/edit' , ['request' => $request , 'commissaries' => $commissaries , 'testers' => $testers ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $cleintRequest = ClientRequest::where('id' , $id)->first();

        if(Auth()->user()->role == 'Admin'){
            // if the type of request is donate 
            $data = $request->only(['tester_id',  'commissary_id']);
            // if the type is get ==> Just Select The commissary_id 
            $cleintRequest->update($data);
        }elseif (Auth()->user()->role == 'Tester') {
            $data = $request->only(['note', 'state' , 'amount' , 'type_of_blood']);
            if ($request->IsOk == 1) {
                $data['IsOk'] = 1 ;
            }else{
                $data['IsOk'] = 0 ;
            }
            $cleintRequest->update($data);
            if ($request->IsOk == 1) {
                $bank = Bank::where('hospital_id' , Null)->where('type' , $request->type_of_blood)->first();
                $newAmount =  $bank->amount + $request->amount ;
                $bank->update(['amount' => $newAmount]);
            }
        }elseif (Auth()->user()->role == 'Commissary') {
            $data = $request->only(['note', 'state']);
            $cleintRequest->update($data);
        } // else if hospital_id
        // $id = Auth()->user()->id 
        // $hospital = Hospital::where('id' , $id)->first();
        //  $bank = Bank::where('hospital_id' , $hospital->id)->where('type' , $request->type_of_blood)->first();
        return redirect('/requests/client')->with('success','Request updated successfully');
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
