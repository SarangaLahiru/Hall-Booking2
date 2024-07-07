<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Bootstrap and FontAwesome -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://use.fontawesome.com/releases/v5.0.6/css/all.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/check_availability.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">




</head>

<body>

    <!--====== NAVBAR ONE PART START ======-->
    <section class="navbar-area navbar-one relative" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="javascript:void(0)">
                            <img src="/logo.png" alt="Logo" width="300px" />
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarOne" aria-controls="navbarOne" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarOne">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item">
                                    <a href="/" class="nav-link">Booking</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/calendar" class="nav-link">Calendar</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/staff" class="nav-link">Staff & Resources</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/resources" class="nav-link">Past Events</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/support" class="nav-link">Help</a>
                                </li>
                                {{-- <div class="boxContact">
                                    <ul class="">

                                        <div>
                                            <i class="fas fa-phone "></i> (123) 456-7890
                                        </div>


                                        <div>
                                            <i class="fas fa-map-marker-alt "></i> 123 Main St, Anytown, USA

                                        </div>
                                    </ul>

                                </div> --}}
                            </ul>
                            <div class="navbar-btn d-none d-sm-inline-block">
                                <div class=""
                                    style="font-size: 13px; color:white; width:200px; position:relative; right:-95px;">
                                    <div>
                                        <i class="fas fa-phone "></i> +94 45-2280021
                                    </div>


                                    <div>
                                        <i class="fas fa-envelope "></i>  audi@ssl.sab.ac.lk
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                    <!-- navbar -->
                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </section>
    <!--====== NAVBAR ONE PART ENDS ======-->

    <div>
        @yield('content')
    </div>

    <!-- Enhanced Footer -->
    <footer class="bg-primary text-light pt-5 pb-4" style="margin-top: 50px;">
        <div class="container">
            <div class="row">
                <!-- Contact Info -->
                <div class="col-md-4 mb-4" style="color: white;">
                    <h5 class="text-uppercase font-weight-bold">Contact Information</h5>
                    <p style="color: white;">
                        <i class="fas fa-map-marker-alt me-2"></i> Faculty of Social Sciences and Languages,<br>
                        Sabaragamuwa University of Sri Lanka,<br>
                        P.O. Box 02, Belihuloya 70140, Sri Lanka
                    </p>
                    <p style="color: white;">
                        <i class="fas fa-phone-alt me-2"></i> +94 45-2280021
                    </p>
                    <p style="color: white;">
                        <i class="fas fa-envelope me-2"></i><a href="mailto:example@gmail.com"
                            class="text-light"> audi@ssl.sab.ac.lk </a>
                    </p>
                </div>
                <!-- Navigation Links -->
                <div class="col-md-4 mb-4">
                    <h5 class="text-uppercase font-weight-bold">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light d-block mb-2"><i class="fas fa-calendar-alt me-2"></i> Booking
                                Calendar</a></li>
                        <li><a href="#" class="text-light d-block mb-2"><i class="fas fa-users me-2"></i> Staff &
                                Resources</a></li>
                        <li><a href="#" class="text-light d-block mb-2"><i class="fas fa-history me-2"></i> Past
                                Events</a></li>
                        <li><a href="#" class="text-light d-block mb-2"><i
                                    class="fas fa-question-circle me-2"></i> Help</a></li>
                    </ul>
                </div>
                <!-- Logo and Social Media -->
                <div class="col-md-4 mb-4 text-center">
                    {{-- <h5 class="text-uppercase font-weight-bold">Prof. Dayananda Somasundara Auditorium Hall</h5>
                    --}}
                    <img src="logo.png" alt="Logo" class="img-fluid mb-3" style="max-width: 100%;">
                    <div>
                        {{-- <a href="#" class="text-light me-3"><i class="fab fa-facebook-f fa-2x"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-twitter fa-2x"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-instagram fa-2x"></i></a>
                        <a href="#" class="text-light"><i class="fab fa-linkedin fa-2x"></i></a> --}}
                    </div>
                </div>
            </div>
            <hr style="background-color: white;">
            <div class="row mt-4">
                <div class="col text-center">
                    <p style="color: white;">&copy; 2024 Prof. Dayananda Somasundara Auditorium - Hall Reservation
                        System. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS for Gradient -->


</body>
<!--====== Bootstrap js ======-->

<script>
    //===== close navbar-collapse when a  clicked
    var navbarTogglerOne = document.querySelector(
        ".navbar-one .navbar-toggler"
    );
    navbarTogglerOne.addEventListener("click", function () {
        navbarTogglerOne.classList.toggle("active");
    });
</script>
{{--

<script src="https://cdn.ayroui.com/1.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script> --}}


<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/glightbox@3.1.0/dist/js/glightbox.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

<script>
    AOS.init();
</script>

</html>
