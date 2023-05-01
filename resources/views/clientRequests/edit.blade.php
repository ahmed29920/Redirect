@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0"> Edit Client Request</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-4 p-3">
                    <form action="{{  route('client.update', $request->id) }}" method="POST" role="form text-left">
                        @csrf
                        @if (isset($request))
                            @method('PUT')
                        @endif
                        @if(Auth()->user()->role == 'Admin')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="user.service" class="form-control-label">Delegator</label>
                                        <div class="@error('user.service')border border-danger rounded-3 @enderror">
                                            <select name="commissary_id" class="form-control" required >
                                            @if (isset($request->commissary_id))
                                                <option value="{{$request->commissary_id}}"> {{$request->commissary->user->name}} </option>
                                            @else    
                                                <option value=""> Choose Delegator Name</option>
                                                @foreach($commissaries as $commissary)
                                                    <option value="{{$commissary->id}}"> {{$commissary->user->name}} </option>  
                                                @endforeach
                                            @endif
                                            </select>
                                            @error('Delegator')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="user.service" class="form-control-label">Tester</label>
                                        <div class="@error('user.service')border border-danger rounded-3 @enderror">
                                            <select name="tester_id" class="form-control" required >
                                            @if (isset($request->tester_id))
                                                <option value="{{$request->tester_id}}"> {{$request->tester->user->name}} </option>
                                            @else    
                                                <option value=""> Choose Tester Name</option>
                                                @foreach($testers as $tester)
                                                    <option value="{{$tester->id}}"> {{$tester->user->name}} </option>  
                                                @endforeach
                                            @endif
                                            </select>
                                            @error('Tester')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif(Auth()->user()->role == 'Tester' && Auth()->user()->role == 'Hospital')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="request-name" class="form-control-label">Type Of Blood</label>
                                        <div class="@error('user.service')border border-danger rounded-3 @enderror">
                                            <select name="type_of_blood" class="form-control" required >
                                                <option value="{{ $request->type_of_blood }}">{{ $request->type_of_blood }}</option>
                                                <option value="A+">A-positive (A+)</option>
                                                <option value="A-">A-negative (A-)</option>
                                                <option value="B+">B-positive (B+)</option>
                                                <option value="B-">B-negative (B-)</option>
                                                <option value="AB+">AB-positive (AB+)</option>
                                                <option value="AB-">AB-negative (AB-)</option>
                                                <option value="O+">O-positive (O+)</option>
                                                <option value="O-">O-negative (O-)</option>
                                            </select>
                                            @error('Tester')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="request-name" class="form-control-label">Amount</label>
                                        <div class="@error('request.name')border border-danger rounded-3 @enderror">
                                            <input class="form-control" value="{{$request->amount }}" type="number" placeholder="client-name" id="client-name" name="amount"  required>
                                                @error('name')
                                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                                @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mt-4 mx-4">
                                        <input type="checkbox" id="" class="mt-1" name="IsOk" value="1" {{$request->IsOk == 1 ? 'checked'  : ''}} />
                                        <label for="request.isOk" class="form-control-label mt-1">Is Ok</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="request-name" class="form-control-label">Note</label>
                                        <div class="@error('request.name')border border-danger rounded-3 @enderror">
                                            <input class="form-control" value="{{$request->note }}" type="text" placeholder="Note About The Request" id="client-name" name="note"  required>
                                                @error('name')
                                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                                @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="user.service" class="form-control-label">State</label>
                                        <div class="@error('user.service')border border-danger rounded-3 @enderror">
                                            <select name="state" class="form-control" required >
                                                <option value="{{$request->state}}"> {{$request->state}} </option>
                                                <option value="Success"> Success </option>  
                                                <option value="Fail"> Fail </option>  
                                            </select>
                                            @error('Tester')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif(Auth()->user()->role == 'Commissary')
                            <div class="row">
                            <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="request-name" class="form-control-label">Note</label>
                                        <div class="@error('request.name')border border-danger rounded-3 @enderror">
                                            <input class="form-control" value="{{$request->name }}" type="text" placeholder="Note About The Request" id="Note " name="note"  >
                                                @error('name')
                                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                                @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="user.service" class="form-control-label">State</label>
                                        <div class="@error('user.service')border border-danger rounded-3 @enderror">
                                            <select name="state" class="form-control" required >
                                            <option value="{{$request->state}}"> {{$request->state}} </option>
                                                <option value="Testing"> Testing </option>  
                                                <option value="Delivering"> Delivering </option>  
                                            </select>
                                            @error('Tester')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif  
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection