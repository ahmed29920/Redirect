@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">All Client Requests</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        @if( count($requests) > 0 )
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Name
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Phone
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Email
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Type
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Request Date
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                        @endif    
                            <tbody>
                                @forelse($requests as $request)
                               <tr>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $request->user->name }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $request->user->phone }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $request->user->email }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $request->type_of_request }}</p>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $request->created_at }}</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('client.edit', $request->id) }}" class="mx-1" data-bs-toggle="tooltip" data-bs-original-title="Edit Request">
                                            <i class="fas fa-user-edit text-info"></i>
                                        </a>
                                        <a href="{{ url('requests/client' , $request->id) }}" class="mx-1" data-bs-toggle="tooltip" data-bs-original-title="Show Request">
                                            <i class="fa fa-television text-primary"></i>
                                        </a>
                                        <span class="mx-1" data-bs-toggle="tooltip" data-bs-original-title="Delete Request">
                                            <i class="cursor-pointer fas fa-trash text-danger removeUser" data-userid="{{$request->id}}"></i>
                                        </span>
                                    </td>
                                </tr>
                                @empty
                                <div class="text-center">
                                    <h4>
                                        No Requests Yet!
                                    </h4>
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection