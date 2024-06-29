<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
    rel="stylesheet"
    href="https://cdn.ayroui.com/1.0/css/bootstrap.min.css"
  />

  <!--====== Lineicons CSS ======-->
  <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet" />

  <!--====== Style css ======-->

  <link rel="stylesheet" href="https://cdn.ayroui.com/1.0/css/starter.css" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/support.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap and FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div id="loadingIndicator" class="loading-indicator">
        <div class="d-flex justify-content-center align-items-center" style="height: 100vh; position: fixed; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(255, 255, 255, 0.8); z-index: 1000;">
          <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden"></span>
          </div>
          {{-- Uncomment below to add loading text --}}
          {{-- <p class="loading-text" style="color:rgb(0, 153, 255);">Loading...</p> --}}
        </div>
      </div>
      <!--====== NAVBAR ONE PART START ======-->
      <section class="navbar-area navbar-one relative">
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
                           {{--  <div class="boxContact">
                              <ul class="">

                                    <div>
                                      <i class="fas fa-phone "></i> (123) 456-7890
                                    </div>


                                     <div>
                                      <i class="fas fa-map-marker-alt "></i> 123 Main St, Anytown, USA

                                     </div>
                               </ul>

                           </div>  --}}
                        </ul>
                        <div class="navbar-btn d-none d-sm-inline-block">
                          <div class="" style="font-size: 13px; color:white; width:200px; position:relative; right:-95px;">
                            <div>
                                <i class="fas fa-phone "></i> +94 45-2280021
                              </div>


                               <div>
                                <i class="fas fa-envelope "></i> example@gmail.com
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
    <!--====== Glightbox  Css ======-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />




    <!--====== VIDEO ONE PART START ======-->
    <section class="video-area video-one">
       <div class="container">
          <div class="row justify-content-center">
             <div class="col-lg-6 col-md-10">
                <div class="video-title text-center">
                   <h5>visual walkthrough</h5>
                   <h2>Video Support</h2>
                   <p class="text-lg">
                    For a visual walkthrough, please watch our demo video below
                   </p>
                </div>
                <!-- video title -->
             </div>
          </div>
          <!-- row -->
          <div class="row justify-content-center">
             <div class="col-lg-10">
                <div class="video-content text-center">
                   <img src="https://cdn.ayroui.com/1.0/images/video/video.png" alt="Video" />
                   <a class="video-popup glightbox" href="https://www.youtube.com/watch?v=NJbXptdalP0">
                   <i class="lni lni-play"></i>
                   </a>
                </div>
             </div>
          </div>
          <!-- row -->
       </div>
       <!-- container -->
    </section>
    <!--====== VIDEO ONE PART ENDS ======-->
    <style>
        .contact-details {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            max-width: 800px;
            margin: 0 auto;
        }
        .contact-details i {
            color: #007bff;
            margin-right: 15px;
        }
        .contact-details h5 {
            margin-bottom: 10px;
        }
        .contact-details p {
            margin-bottom: 0;
            font-size: 1rem;
        }
    </style>


    <div class="container mt-5">
        <div class="text-center mt-5 mb-5">
            <h2>Contact Us</h2>
        </div>

        <div class="contact-details">
            <div class="row mb-4">
                <div class="col-md-12 d-flex align-items-start">
                    <i class="fas fa-map-marker-alt fa-2x"></i>
                    <div>
                        <h5>Address</h5>
                        <p>Faculty of Social Sciences and Languages,<br>
                        Sabaragamuwa University of Sri Lanka,<br>
                        P.O. Box 02, Belihuloya 70140,<br>
                        Sri Lanka</p>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-12 d-flex align-items-start">
                    <i class="fas fa-phone fa-2x"></i>
                    <div>
                        <h5>Telephone</h5>
                        <p>+94 45-2280021</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 d-flex align-items-start">
                    <i class="fas fa-envelope fa-2x"></i>
                    <div>
                        <h5>Email</h5>
                        <p>[Email to be provided]</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== Glightbox js ======-->
    <script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            showLoadingIndicator();
          });
        window.onload = function() {
            hideLoadingIndicator();
          };

        function showLoadingIndicator() {
            document.getElementById('loadingIndicator').style.display = 'block';
          }

          function hideLoadingIndicator() {
            document.getElementById('loadingIndicator').style.display = 'none';
          }
          //========= glightbox
          const videoTwo = GLightbox({
            selector: ".glightbox",
            type: "video",
            source: "youtube", //vimeo, youtube or local
            width: 900,
            autoplayVideos: true,
          });
     </script>

     <script src="https://cdn.ayroui.com/1.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

  <script>
    //===== close navbar-collapse when a  clicked
    var navbarTogglerOne = document.querySelector(
      ".navbar-one .navbar-toggler"
    );
    navbarTogglerOne.addEventListener("click", function () {
      navbarTogglerOne.classList.toggle("active");
    });
 </script>
 <script src="https://cdn.jsdelivr.net/npm/glightbox@3.1.0/dist/js/glightbox.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

</body>
</html>
