@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0"> {{ isset($admin) ? 'Update Admin' : 'Add New Admin' }}</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-4 p-3">
                    <form action="{{ isset($admin) ? route('admins.update', $admin->id) : route('admins.store') }}" method="POST" role="form text-left">
                        @csrf
                        @if (isset($admin))
                            @method('PUT')
                        @endif
                        @if($errors->any())
                            <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                                <span class="alert-text text-white">
                                {{$errors->first()}}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <i class="fa fa-close" aria-hidden="true"></i>
                                </button>
                            </div>
                        @endif
                        @if(session('success'))
                            <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                                <span class="alert-text text-white">
                                {{ session('success') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <i class="fa fa-close" aria-hidden="true"></i>
                                </button>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user-name" class="form-control-label">{{ __('Full Name') }}</label>
                                    <div class="@error('user.name')border border-danger rounded-3 @enderror">
                                        <input class="form-control" value="{{ isset($admin) ? $admin->user->name : '' }}" type="text" placeholder="Name" id="user-name" name="name" required>
                                            @error('name')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user-phone" class="form-control-label">{{ __('Phone') }}</label>
                                    <div class="@error('user.phone')border border-danger rounded-3 @enderror">
                                        <input class="form-control" value="{{ isset($admin) ? $admin->user->phone : '' }}" type="tel" placeholder="Phone Number" id="number" name="phone" required>
                                            @error('phone')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user-email" class="form-control-label">{{ __('Email') }}</label>
                                    <div class="@error('email')border border-danger rounded-3 @enderror">
                                        <input class="form-control" value="{{ isset($admin) ? $admin->user->email : '' }}" type="email" placeholder="@example.com" id="user-email" name="email" required>
                                            @error('email')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                            @if (!isset($admin))
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user-password" class="form-control-label">{{ __('Password') }}</label>
                                    <div class="@error('email')border border-danger rounded-3 @enderror">
                                        <input class="form-control" value="" type="password" placeholder="" id="user-password" name="password" required>
                                            @error('password')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="row">
                            @if (isset($admin))
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user.role" class="form-control-label">{{ __('Role') }}</label>
                                    <div class="@error('user.role')border border-danger rounded-3 @enderror">
                                        <select name="role" class="form-control" required>
                                        @if (isset($admin))
                                            <option value="{{$admin->user->role}}"> {{$admin->user->role}} </option>
                                        @else    
                                            <option value=""> Choose Staff Role </option>
                                        @endif
                                            <option value="Admin">Admin</option>
                                            <option value="Tester">Tester</option>
                                            <option value="Commissary">Commissary</option>
                                            <option value="Client">Client</option>
                                        </select>
                                        @error('role')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ isset($admin) ? 'Update' : 'Add' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection