@extends('layouts.home')

@section('content')
<!--start plotos-->
<div class="container-fluid">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="{{ asset('assets\user\img\4438756.jpg') }} " class="d-block w-100" alt="image">
                </div>
                <div class="carousel-item">
                <img src="{{ asset('assets\user\img\4434008.jpg') }} " class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src= " {{ asset('assets\user\img\blood-donor-day.jpg') }}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!--end plotos-->

    <!--start landing-->
    <div class="landing mt-5 d-flex justify-content-center align-items-center">
        <dix class="text-center mt-5">
            <h1 class="mb-5 fw-bolder">"Donate Your Blood to Us, Save More Life Together"</h1>
            <h1 class="mb-5 fw-bolder">"Your Donation Can Make Someone’s Life Better"</h1>
        </dix>

    </div>    
    <!--end landding-->

    <div class="features text-center pt-5 pb-5">
        <div class="container">
            <div class="main-title mt-5 mb-5 position-relative"  >
                <i class="fa-solid fa-stethoscope  mb-4 " style="height: 3em;"></i>
                <h2>Best Services</h2>
                <p class="fw-light" >We offer a range of services, the most important of which are</p>

            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="feat">
                        <div class="icon-holder position-relative">
                        <i class="fa-solid fa-1 position-absolute bottom-0 number"></i>
                        <i class="fa-regular  fa-4x fa-hospital position-absolute bottom-0 icon"></i>
                        </div>
                        <h4 class="mb-3 mt-3 text-uppercase"> Blood Donation</h4>
                        <p class="fw-light lh-lg" >Through our website, it is possible to provide the blood donation process, whether through the home or the hospital</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="feat">
                        <div class="icon-holder position-relative">
                        <i class="fa-solid fa-2 position-absolute bottom-0 number"></i>
                        <i class="fa-solid fa-check position-absolute bottom-0 icon fa-5x"></i>
                        </div>
                        <h4 class="mb-3 mt-3 text-uppercase"> Health Check</h4>
                        <p class="fw-light lh-lg" >Our site provides information about your blood when you donate blood if you have a health problem that makes your blood unhealthy</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="feat">
                        <div class="icon-holder position-relative">
                            <i class="fa-solid fa-3 position-absolute bottom-0 number"></i>
                        <i class="fa-solid fa-truck-medical fa-4x  position-absolute bottom-0 icon"></i>
                        </div>
                        <h4 class="mb-3 mt-3 text-uppercase"> Blood Bank</h4>
                        <p class="fw-light lh-lg" >There is also a blood bank for those who want to request blood, as we contribute to providing blood for those who need it</p>
                    </div>
                </div>
            </div>
        </div>    
    </div>            
    <!--start about-->
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

    <!--start not allowed-->
    <div class="features text-center pt-5 pb-5">
        <div class="container">
            <div class="main-title mt-5 mb-5 position-relative"  >
                <i class="fa-solid fa-ban  mb-5 " style="height: 3em;"></i>
                <h2 class="mb-3">Who are the people prohibited from donating blood?</h2>
                <p class="fw-light mt-3" >Not everyone is able to donate blood,
                    as there are conditions and controls that have been established to determine who is eligible to take this step,
                    as the donor must be over the age of seventeen years and weigh more than 
                    fifty kilograms with the necessity of enjoying good health. </p>

                    
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="feat mt-5">
                        <p class="fw-light lh-lg d-inline" >pregnant woman.</p>
                        <i class="fa-solid fa-xmark fa-lg me-3  d-inline"></i><br>
                        <p class="fw-light lh-lg d-inline" >The person with a fever.</p>
                        <i class="fa-solid fa-xmark fa-lg me-3  d-inline"></i><br>
                        <p class="fw-light lh-lg d-inline" >People with anemia.</p>
                        <i class="fa-solid fa-xmark fa-lg me-3  d-inline"></i><br>
                        <p class="fw-light lh-lg d-inline" >Patients who have had surgery recently.</p>
                        <i class="fa-solid fa-xmark fa-lg me-3  d-inline"></i><br>
                        <p class="fw-light lh-lg d-inline" >People who have recently had body piercings or tattoos.</p>
                        <i class="fa-solid fa-xmark fa-lg me-3  d-inline"></i><br>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="feat  mt-5">
                        <p class="fw-light lh-lg d-inline" >Some cancer patients like leukemia.</p>
                        <i class="fa-solid fa-xmark fa-lg me-3  d-inline"></i><br>
                        <p class="fw-light lh-lg d-inline" >Patients with hepatitis B and hepatitis C.</p>
                        <i class="fa-solid fa-xmark fa-lg me-3  d-inline"></i><br>
                        <p class="fw-light lh-lg d-inline" >Persons under the influence of alcohol.</p>
                        <i class="fa-solid fa-xmark fa-lg me-3  d-inline"></i><br>
                        <p class="fw-light lh-lg d-inline" >People infected with malaria.</p>
                        <i class="fa-solid fa-xmark fa-lg me-3  d-inline"></i><br>
                        <p class="fw-light lh-lg d-inline" >People with certain blood diseases, such as thrombocytopenia and haemophilia.</p>
                        <i class="fa-solid fa-xmark fa-lg me-3  d-inline"></i><br>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="feat  mt-5">
                        <p class="fw-light lh-lg d-inline" >Patients with immune diseases such as lupus erythematosus.</p>
                        <i class="fa-solid fa-xmark fa-lg me-3  d-inline"></i><br>
                        <p class="fw-light lh-lg d-inline" >Some people with skin diseases such as scleroderma.</p>
                        <i class="fa-solid fa-xmark fa-lg me-3  d-inline"></i><br>
                        <p class="fw-light lh-lg d-inline" >Those with HIV or sexually transmitted diseases.</p>
                        <i class="fa-solid fa-xmark fa-lg me-3  d-inline"></i><br>
                        <p class="fw-light lh-lg d-inline" >People with heart disease or severe lung disease.</p>
                        <i class="fa-solid fa-xmark fa-lg me-3  d-inline"></i><br>
                    </div>
                </div>
            </div>
        </div>    
    </div>    
    <!--end not allowed-->  
    
    <!--start donate-->
    <section class="vh-80" id="donate">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                    <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                        
                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4"> Please Type your Information</p>
                        
                        <form class="mx-1 mx-md-4">
                            <div class="d-flex flex-row align-items-center mb-4">
                                <i class="fa-regular fa-house fa-lg me-3 fa-fw mt-2"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <label for="Way" class="form-label"> Way :</label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>select</option>
                                            <option value="1">From Hospital</option>
                                            <option value="2">From Home</option>
                                        </select>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center mb-4 ">
                                <i class="fa-solid fa-location-dot fa-lg me-3 fa-fw mt-2  "></i>
                                <div class="form-outline flex-fill mb-0">
                                <input type="text" id="form3Example4c" class="form-control" placeholder="Type Your Location"/>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center mb-4 ">
                                <i class="fa-regular fa-calendar-plus fa-lg me-3 fa-fw mt-2"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <label for="time" class="form-label"> Date :</label>
                                    <input type="date" id="form3Example4c" class="form-control" placeholder="Type Date"/>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center mb-4 ">
                                <i class="fa-regular fa-hospital fa-lg me-3 fa-fw mt-2"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <label for="choose" class="form-label"> Choose Hospital :</label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>select</option>
                                            <option value="1"> Hospital 1</option>
                                            <option value="2">Hospital 2</option>
                                        </select>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                <button type="button" class="btn btn-primary btn-lg"> Confirm</button>
                                
                            </div>
                            
                        </form>

                    </div>
                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                        <img src="{{ asset('assets\user\img\donate-blood-save-lives-2-638.webp') }}"
                        class="img-fluid" alt="Sample image">

                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    <!--end donate-->


@endsection