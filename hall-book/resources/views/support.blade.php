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
                      {{--  <ul>
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
                      </ul>  --}}
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
                   <h5>Learn & Share</h5>
                   <h2>Do good work and share</h2>
                   <p class="text-lg">
                      Firsthand accounts from leaders who have changed the world we
                      live in and the entrepreneurs shaping tomorrow’s world.
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
</body>
</html>
