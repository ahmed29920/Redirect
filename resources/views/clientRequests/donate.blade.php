@extends('layouts.home')

@section('content')
<section class="mt-5">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                    <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4"> Please Type your Information</p>
                        <form class="mx-1 mx-md-4" action="{{ route('client.store') }}" method="POST">
                        @csrf
                            <input type="hidden" name="typeOfRequest" value="Donate">
                            <div class="d-flex flex-row align-items-center mb-4">
                                <i class="fa-solid fa-house-medical fa-lg me-3 fa-fw mt-2"></i>
                                <div class="form-outline flex-fill mb-0">
                                        <select class="form-select" name="way" aria-label="Default select example">
                                            <option value="">Select Way </option>
                                            <option value="Home">From Home</option>
                                            <option value="Hospital">From Hospital</option>
                                        </select>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center mb-4">
                                <i class="fa-solid fa-list-ol fa-lg me-3 fa-fw "></i>
                                <div class="form-outline flex-fill mb-0">
                                    <input type="number" name="amount" id="form3Example1c" class="form-control" placeholder="Enter The Quantity Of Blood" required/>
                                </div>
                            </div>
                            <div class="input-group ">
                                <i class="fa-solid fa-droplet fa-lg me-3 fa-fw mt-2"></i>
                                <select class="form-select mb-lg-4 mb-4" name="typeOfBlood" id="inputGroupSelect01" required >
                                    <option selected>Enter Your Type Of Blood </option>
                                    <option value="A+">A-positive (A+)</option>
                                    <option value="A-">A-negative (A-)</option>
                                    <option value="B+">B-positive (B+)</option>
                                    <option value="B-">B-negative (B-)</option>
                                    <option value="AB+">AB-positive (AB+)</option>
                                    <option value="AB-">AB-negative (AB-)</option>
                                    <option value="O+">O-positive (O+)</option>
                                    <option value="O-">O-negative (O-)</option>
                                </select>
                            </div>
                            <div class="d-flex flex-row align-items-center mb-4 ">
                                <i class="fa-solid fa-location-dot fa-lg me-3 fa-fw mt-2  "></i>
                                <div class="form-outline flex-fill mb-0">
                                <input type="text" id="form3Example4c" class="form-control" name="location" placeholder="Type Your Location" required/>
                                </div>
                            </div>
                            <!-- <div class="d-flex flex-row align-items-center mb-4 ">
                                <i class="fa-regular fa-hospital fa-lg me-3 fa-fw mt-2"></i>
                                <div class="form-outline flex-fill mb-0">
                                        <select class="form-select" aria-label="Default select example">
                                            <option >Choose Hospital</option>
                                            <option value="1"> Hospital 1</option>
                                            <option value="2">Hospital 2</option>
                                        </select>
                                </div>
                            </div> -->
                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                <button type="submit" class="btn btn-primary btn-lg"> Confirm</button>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    @endsection