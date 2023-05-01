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
                                    <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-4 mt-4"> Request Quentity Of Blood</p>
                                    <p class="text-center ">Each request is for one person only,Make a requests for everyone who wants to donate if you are more than one person</p>
                                    <form class="mx-1 mx-md-7">
                                        <div class="d-flex flex-row align-items-center mb-4 ">
                                            <i class="fa-solid fa-location-dot fa-lg me-3 fa-fw "></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example1c" class="form-control" placeholder="Enter Your location" required/>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fa-regular fa-id-card fa-lg me-3 fa-fw  "></i>
                                                <div class="form-outline flex-fill mb-0">
                                                <input type="number" id="form3Example1c" class="form-control" placeholder="Your ID" required/>
                                                </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fa-solid fa-list-ol fa-lg me-3 fa-fw "></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="number" id="form3Example1c" class="form-control" placeholder="Enter The Quantity Of Blood" required/>
                                            </div>
                                        </div>
                                        <div class="input-group ">
                                            <i class="fa-solid fa-droplet fa-lg me-3 fa-fw mt-2"></i>
                                            <select class="form-select mb-lg-4 mb-4  " id="inputGroupSelect01" required >
                                                <option selected>Enter Your Type Of Blood </option>
                                                <option value="1">A-positive (A+)</option>
                                                <option value="2">A-negative (A-)</option>
                                                <option value="3">B-positive (B+)</option>
                                                <option value="3">B-negative (B-)</option>
                                                <option value="3">AB-positive (AB+)</option>
                                                <option value="3">AB-negative (AB-)</option>
                                                <option value="3">O-positive (O+)</option>
                                                <option value="3">O-negative (O-)</option>
                                            </select>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4 ">
                                            <i class="fa-regular fa-calendar-plus fa-lg me-3 fa-fw mt-2"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="date" id="form3Example4c" class="form-control" placeholder="Type Date" required/>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fa-solid fa-upload fa-lg me-3 fa-fw mt-4"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label ms-4" for="customFile">Enter The Official File Of The Patient</label>
                                                <input type="file" class="form-control" id="customFile" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                <button type="button" class="btn btn-primary btn-lg">Confirm</button>
                                            </div>
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