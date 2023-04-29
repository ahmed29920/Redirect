@extends('layouts.home')

@section('content')

<div class="stuff pt-5" id="about">
        <div class="container">
            <div class="main-title  text-center mt-5 mb-5 position-relative"  >
                <i class="fa-solid fa-users-gear  mb-4 " style="height: 3em;"></i>
                <h2>About us</h2>
                <p class="fw-light" >Together We Can Make World More Health & Better</p>

            </div>
                <p class="descreption text-center mb-5 fw-light m-auto"> Our site is a charitable site that aims to help people free of
                    charge by helping those who desperately need blood and saving their lives. Therefore, we ask you to helping
                    us in that, by donating your blood.</p>
                    <div class="row ">
                        <div class="col-lg-4 mb-4 text-center text-md-start">
                            <div class="text">
                                <h4>Together We Can Make World More Health & Better</h4>
                                <p class="mt-5 lh-lg text-black-50">
                                    A blood bank is a storage store for blood and its components, which are collected from their blood donors,
                                    as blood and its components are collected and stored and preserved for later use in operations that require blood transfusion.
                                    The term "blood bank" refers to a section in hospitals where blood and blood products are stored after the necessary
                                    tests have been performed to reduce risks related to blood transfusions. However,
                                        it sometimes refers to a collection center, and some hospitals even collect blood.
                                </p>

                            </div>

                        </div>
                        <div class="col-lg-8 ">
                            <div class="image " >
                                <img class="img-fluid "  src="{{ asset('assets\user\img\pngtree-blood-donation-poster-background-material-picture-image_1007436.jpg') }}" alt="blood bank" width="70%" style="margin-left:20%">
                            </div>
                        </div>
                    </div>
        </div>
    </div> 
    <!--end about-->

    @endsection