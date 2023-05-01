@extends('layouts.home')

@section('content')
<section class="mt-5">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                                <h3> Your Request Sent Successfully Send  </h3>
                                <h5> Your secret code is <b> {{ $NewRequest->code }} </b> <br>
                                 Do not tell it to anyone except the representative who will come to get blood from you </h5>
                                <p> You can check the state of your request using this serial  {{ $NewRequest->serial }} </p>
                                <a href="/" class="btn btn-info"> Back </a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection