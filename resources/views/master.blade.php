<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>MM Création - Bijoux & Accessoires</title>
<link rel="icon" href="https://jumpshare.com/s/B9XvJikKcB028yp3fLAs" type="image/x-icon">
<link rel="shortcut icon" href="https://jumpshare.com/s/B9XvJikKcB028yp3fLAs" type="image/x-icon">
<link rel="apple-touch-icon" href="https://jumpshare.com/s/B9XvJikKcB028yp3fLAs">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-villa-agency.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

    <style>
      figure {
        position: relative;
        display: grid;
        overflow: hidden;
        border-radius: 1rem;
        cursor: pointer;
      }

      figure img {
        width: 100%;
        height: auto;
        display: block;
        transition: transform 0.4s ease;
        grid-area: 1/1;
      }

      figure figcaption {
        grid-area: 1/1;
        align-self: end;
        background: var(--i);
        color: white;
        font-family: sans-serif;
        font-size: 2rem;
        font-weight: bold;
        padding: 1rem;
        transform: translateY(100%);
        transition: transform 0.4s ease;
      }

      figure:hover img {
        transform: scale(1.1);
      }

      figure:hover figcaption {
        transform: translateY(0);
      }
    </style>
  </head>
  <body>
 <!-- Add Font Awesome for WhatsApp icon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
    .whatsapp-btn {
        position: fixed;
        bottom: 30px;
        right: 30px;
        background: #25D366; /* WhatsApp green */
        color: white;
        padding: 15px 25px;
        border-radius: 50px;
        font-size: 18px;
        font-weight: bold;
        text-decoration: none;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        z-index: 1000;
        display: flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s ease;
    }

    .whatsapp-btn:hover {
        background: #128C7E; /* Darker green on hover */
        transform: scale(1.05);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
    }

    .whatsapp-btn i {
        font-size: 24px;
    }
</style>

<!-- Replace PHONE_NUMBER with your actual number (include country code, e.g., +1234567890) -->
<a href="https://wa.me/0613060259" class="whatsapp-btn" target="_blank">
    <i class="fab fa-whatsapp"></i> commander sur WhatsApp
</a>
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <div class="sub-header">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-8">
            <ul class="info">
              <li><i class="fa fa-envelope"></i> m_mcreationn@gmail.com</li>

            </ul>
          </div>
          <div class="col-lg-4 col-md-4">
            <ul class="social-links">
              <li><a href="#"><i class="fab fa-facebook"></i></a></li>
              <li><a href="https://x.com/minthu" target="_blank"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
              <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- ***** Header Area Start ***** -->
    @include("navbar")
    <!-- ***** Header Area End ***** -->

    @yield('content')

    <!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            
        <div class="text-center pt-3 border-top">
            <p class="mb-0">
                © 2023 MM Création. Tous droits réservés
            </p>
        </div>
    </div>
</footer>

    <!-- Scripts -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/counter.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
  </body>
</html>
