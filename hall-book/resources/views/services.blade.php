

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
    <link rel="stylesheet" href="{{ asset('css/resources.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

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
    <section class="navbar-area navbar-one ">
       <div class="container">
          <div class="row">
             <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg">
                   <a class="navbar-brand" href="javascript:void(0)">
                   <img src="/logo.png" alt="Logo" width="300px"  />
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
                   <div class="navbar-btn d-none d-sm-inline-block">
                      <ul>
                         {{--  <li>
                            <a class="btn primary-btn-outline" href="javascript:void(0)"
                               >Sign In</a
                               >
                         </li>
                         <li>
                            <a class="btn primary-btn" href="javascript:void(0)"
                               >Sign Up</a
                               >
                         </li>  --}}
                      </ul>
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

    <!--======  Start Section Title One ======-->
<div class="section-title-one">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="text-center">
               <div class="content">
                  <h2 class="fw-bold">Our Key Features</h2>
                  <p>
                     Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do
                     eiusmod tempor incididunt ut labore et dolore magna aliqua.
                  </p>
               </div>
            </div>
         </div>
      </div>
      <!-- row -->
   </div>
   <!-- container -->
</div>
<!--====== ABOUT TWO PART ENDS ======-->
    <!--====== TEAM STYLE ONE START ======-->
<section class="team-area">
   <div class="container">
      <div class="row">
         <div class="col-lg-3 col-md-6">
            <div class="single-team text-center team-style-one">
               <div class="team-image">
                  <img src="https://cdn.ayroui.com/1.0/images/team/team-1.jpg" alt="Team" />
               </div>
               <div class="team-content">
                  <h4 class="name">Jeffery Riley</h4>
                  <span class="sub-title">Art Director</span>
                  <ul class="social">
                     <li>
                        <a href="javascript:void(0)">
                        <i class="lni lni-facebook-filled"></i>
                        </a>
                     </li>
                     <li>
                        <a href="javascript:void(0)">
                        <i class="lni lni-twitter-original"></i>
                        </a>
                     </li>
                     <li>
                        <a href="javascript:void(0)">
                        <i class="lni lni-linkedin-original"></i>
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
            <!-- single team -->
         </div>
         <div class="col-lg-3 col-md-6">
            <div class="single-team text-center team-style-one">
               <div class="team-image">
                  <img src="https://cdn.ayroui.com/1.0/images/team/team-2.jpg" alt="Team" />
               </div>
               <div class="team-content">
                  <h4 class="name">Riley Beata</h4>
                  <span class="sub-title">Art Director</span>
                  <ul class="social">
                     <li>
                        <a href="javascript:void(0)">
                        <i class="lni lni-facebook-filled"></i>
                        </a>
                     </li>
                     <li>
                        <a href="javascript:void(0)">
                        <i class="lni lni-twitter-original"></i>
                        </a>
                     </li>
                     <li>
                        <a href="javascript:void(0)">
                        <i class="lni lni-linkedin-original"></i>
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
            <!-- single team -->
         </div>
         <div class="col-lg-3 col-md-6">
            <div class="single-team text-center team-style-one">
               <div class="team-image">
                  <img src="https://cdn.ayroui.com/1.0/images/team/team-3.jpg" alt="Team" />
               </div>
               <div class="team-content">
                  <h4 class="name">Kamil Kiwis</h4>
                  <span class="sub-title">Art Director</span>
                  <ul class="social">
                     <li>
                        <a href="javascript:void(0)">
                        <i class="lni lni-facebook-filled"></i>
                        </a>
                     </li>
                     <li>
                        <a href="javascript:void(0)">
                        <i class="lni lni-twitter-original"></i>
                        </a>
                     </li>
                     <li>
                        <a href="javascript:void(0)">
                        <i class="lni lni-linkedin-original"></i>
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
            <!-- single team -->
         </div>
         <div class="col-lg-3 col-md-6">
            <div class="single-team text-center team-style-one">
               <div class="team-image">
                  <img src="https://cdn.ayroui.com/1.0/images/team/team-4.jpg" alt="Team" />
               </div>
               <div class="team-content">
                  <h4 class="name">Kamil Kiwis</h4>
                  <span class="sub-title">Art Director</span>
                  <ul class="social">
                     <li>
                        <a href="javascript:void(0)">
                        <i class="lni lni-facebook-filled"></i>
                        </a>
                     </li>
                     <li>
                        <a href="javascript:void(0)">
                        <i class="lni lni-twitter-original"></i>
                        </a>
                     </li>
                     <li>
                        <a href="javascript:void(0)">
                        <i class="lni lni-linkedin-original"></i>
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
            <!-- single team -->
         </div>
      </div>
      <!-- row -->
   </div>
   <!-- container -->
</section>
<!--====== TEAM STYLE ONE ENDS ======-->

</body>
<script src="https://cdn.jsdelivr.net/npm/glightbox@3.1.0/dist/js/glightbox.min.js"></script>
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

</html>

