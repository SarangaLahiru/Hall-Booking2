<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/check_availability.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="bower_components/aos/dist/aos.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

</head>

<body>
    <!--====== NAVBAR ONE PART START ======-->
    <section class="navbar-area navbar-one ">
       <div class="container">
          <div class="row">
             <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg">
                   <a class="navbar-brand" href="javascript:void(0)">
                   <img src="/logo.png" alt="Logo" width="300px" />
                   </a>
                   <button
                      class="navbar-toggler"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#navbarOne"
                      aria-controls="navbarOne"
                      aria-expanded="false"
                      aria-label="Toggle navigation"
                      >
                   <span class="toggler-icon"></span>
                   <span class="toggler-icon"></span>
                   <span class="toggler-icon"></span>
                   </button>
                   <div class="collapse navbar-collapse sub-menu-bar" id="navbarOne">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item">
                            <a href="/">Booking</a>
                         </li>

                         <li class="nav-item">
                            <a href="/resources">Resources</a>
                         </li>
                         <li class="nav-item">
                            <a href="/staff">Staff</a>
                         </li>
                         <li class="nav-item">
                            <a href="/support">Help</a>
                         </li>
                      </ul>
                   </div>
                   {{--  <div class="navbar-btn d-none d-sm-inline-block">
                      <ul>
                         <li>
                            <a class="btn primary-btn-outline" href="javascript:void(0)"
                               >Sign In</a
                               >
                         </li>
                         <li>
                            <a class="btn primary-btn" href="javascript:void(0)"
                               >Sign Up</a
                               >
                         </li>
                      </ul>
                   </div>  --}}
                </nav>
                <!-- navbar -->
             </div>
          </div>
          <!-- row -->
       </div>
       <!-- container -->
    </section>
    <!--====== NAVBAR ONE PART ENDS ======-->




    <div class="containe">
        @yield('content')
    </div>
</body>
<!--====== Bootstrap js ======-->
    <script src="https://cdn.ayroui.com/1.0/js/bootstrap.bundle.min.js"></script>
    <script src="bower_components/aos/dist/aos.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
      </script>

    <script>
       //===== close navbar-collapse when a  clicked
       var navbarTogglerOne = document.querySelector(
         ".navbar-one .navbar-toggler"
       );
       navbarTogglerOne.addEventListener("click", function () {
         navbarTogglerOne.classList.toggle("active");
       });
    </script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

</html>
