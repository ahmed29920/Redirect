@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">All Testers</h5>
                        </div>
                        <a href="{{url('testers/create')}}" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; New Tester</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                    @if( count($testers) > 0 )
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
                                        Creation Date
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                        @endif    
                            <tbody>
                                @forelse($testers as $tester)
                               <tr>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $tester->user->name }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $tester->user->phone }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $tester->user->email }}</p>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $tester->created_at }}</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('testers.edit', $tester->id) }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit user">
                                            <i class="fas fa-user-edit text-info"></i>
                                        </a>
                                        <span>
                                            <i class="cursor-pointer fas fa-trash text-danger removeUser" data-userid="{{$tester->id}}"></i>
                                        </span>
                                    </td>
                                </tr>
                                @empty
                                <div class="text-center">
                                    <h4>
                                        No Testers!
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
<script src="../assets/js/core/jquery.min.js"></script>
 
<script>
    $('.removeUser').on('click', function(event) {
    event.preventDefault()
    userId = event.target.dataset['userid'];
    var li =  $(this);
    $.ajax({
        method: 'GET',
        url: 'testers/remove/' + userId,
        cache: false,
        data: {
            userid: userId ,
        },
        success: function() {
            li.parent().parent().parent().remove();
        },
    })
});
</script>
@endsection