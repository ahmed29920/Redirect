<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blood bank</title>
    <link rel="stylesheet" href="{{ asset('assets\user\css\bootstrap.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets\user\css\all.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets\user\css\home.css') }}  ">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,500;0,700;0,900;1,100;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

</head>
<body>
    <!--start navbar-->
    <nav class="navbar navbar-expand-lg" style="background-color : #eee ; z-index : 999 ">
        <div class="container-fluid" >
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets\user\img\366-3668760_blood-bank-logo-blood-donation-logo-transparent.png') }} " alt="" width="50" height="40" class="d-inline-block align-text-center p-0.5 ms-3 img">
                Blood Bank
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active p-2 p-lg-3 " aria-current="page" href="/">HOME</a>
                        <li class="nav-item">
                            <a class="nav-link p-2 p-lg-3" href="{{route('about')}}">ABOUT US</a>
                        </li>
                    </li>
                    @if(!Auth())
                    <li class="nav-item ">
                        <a class="nav-link p-2  p-lg-3" href="log-in.html">SIGN IN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-2 p-lg-3" href="registeration.html">SIGN UP</a>
                    </li>
                    @else
                    <li class="nav-item ">
                        <a href="{{ url('/logout')}}" class="nav-link p-2 p-lg-3">
                            <span class="d-sm-inline d-none">Sign Out</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-2 p-lg-3" href="clint-dashbord.html">MY PROFILE</a>
                    </li>
                    @endif
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            REQUEST
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('donateRequest')}}" href="donate.html">Donate</a></li>
                            <li><a class="dropdown-item" href="{{route('getRequest')}}">Request Blood</a></li>
                        </ul>
                    </div>
                </ul>
                
        </div>
        </div>
    </nav>
    <!--end navbar-->

    @yield('content')

    <!--start footer-->
    <div class="container-fluid  my-5 " style="background-color: rgb(208, 152, 152);">

        <footer>
            <div class="container p-4" style="margin-bottom: -17rem;">
                <div class="row">
                    <div class="col-lg-6 col-md-12 mb-4">
                    <h5 class="mb-3 text-dark " >blood bank</h5>
                    <p style="color: rgb(143, 57, 57);" >
                        Our site is a charitable site that aims to help people free of
                    charge by helping those who desperately need blood and saving their lives. Therefore, we ask you to helping
                    us in that, by donating your blood
                    </p>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="mb-3 text-dark ">links</h5>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-1">
                            <a href="home.html" style="color: rgb(143, 57, 57);";>HOME</a>
                        </li>
                        <li class="mb-1">
                            <a href="registeration.html" style="color: rgb(143, 57, 57);">SIGN UP</a>
                        </li>
                        <li class="mb-1">
                            <a href="log-in.html " style="color: rgb(143, 57, 57);">SIGN IN</a>
                        </li>
                        <li>
                            <a href="#about" style="color: rgb(143, 57, 57);">About US</a>
                        </li>
                    </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="mb-1 text-dark  ">services</h5>
                    <table class="table" >
                        <tbody>
                            <tr>
                            <td>    BLOOD DONATION    </td>
                            
                            </tr>
                            <tr>
                            <td>   HEALTH CHECK   </td>
                            
                            </tr>
                            <tr>
                            <td>    BLOOD BANK     </td>
                            
                            </tr>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </footer>
    </div>
<!-- End footer -->
<script src="{{ asset('assets\user\js\bootstrap.bundle.min.js') }}"></script>
<script  src="{{ asset('assets\user\js\all.min.js') }}"></script>
</body>
</html>