@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0"> Client Request</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-4 p-3">
                    <div class="row">
                        <div class="row border-bottom">
                            <div class="col-md-6">
                                <div class="ms-4 mt-4">
                                    <h6>Client Name : {{$request->user->name}}</h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="ms-4 mt-4">
                                    <h6>Client Phone : {{$request->user->phone}}</h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="ms-4 mt-4">
                                    <h6>Type Of Request : {{$request->type_of_request}}  </h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="ms-4 mt-4">
                                    <h6>Way : {{$request->way}} </h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="ms-4 mt-4">
                                    <h6>Type Of Blood : {{$request->type_of_blood}} </h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="ms-4 mt-4">
                                    <h6>Amount Of Blood: {{$request->amount}} </h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="ms-4 mt-4">
                                    <h6>Way : {{$request->way}} </h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="ms-4 mt-4">
                                    <h6>State : {{$request->state}} </h6>
                                </div>
                            </div>
                            @if($request->way == 'Home')
                            <div class="col-md-6">
                                <div class="ms-4 mt-4">
                                    <h6>Location : {{$request->location}} </h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="ms-4 mt-4">
                                    @if($request->commissary_id != Null)
                                    <h6>Delegator Name : {{$request->commissary->user->name}} </h6>
                                    @else
                                    <h6>Delegator Name : -- </h6>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="ms-4 mt-4">
                                    @if($request->tester_id != Null)
                                    <h6>Tester Name : {{$request->tester->user->name}} </h6>
                                    @else
                                    <h6>Tester Name : -- </h6>
                                    @endif
                                </div>
                            </div>
                            
                            @else
                            <div class="col-md-6">
                                <div class="ms-4 mt-4">
                                    <h6>Hospital Name : {{$request->hospital->user->name}} </h6>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="ms-4 mt-4">
                                @if($request->IsOk != Null)
                                    <h6>Valid Blood :  {{ (  ($request->IsOk == 1) ? 'Yes' : 'No') }} </h6>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="ms-4 mt-4">
                                @if($request->Note != Null)
                                    <h6>Note :  {{ $request->note }} </h6>
                                @endif
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('client.index') }}" class="btn bg-gradient-info btn-md mt-4 mb-4 me-4">{{ __('Back') }}</a>
                            <a href="{{ route('client.edit', $request->id) }}" class="btn bg-gradient-warning btn-md mt-4 mb-4 me-4">{{ __('Edit') }}</a>
                            <button  class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ __('Print') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection