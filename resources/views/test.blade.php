<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Santé & Gourmandise | Restaurant • Pharmacie • Café</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <style>
        .service-card {
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s;
            margin-bottom: 30px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.1);
            border: none;
        }
        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }
        .service-img {
            height: 250px;
            object-fit: cover;
        }
        .pharmacy-badge {
            background: #4e9f3d;
        }
        .restaurant-badge {
            background: #f35525;
        }
        .cafe-badge {
            background: #d4a762;
        }
        .section-divider {
            border-top: 2px dashed #f35525;
            margin: 60px 0;
            opacity: 0.3;
        }
        .opening-hours li {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px dashed #eee;
        }
    </style>
</head>

<body>

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

  <!-- Sub-Header -->
  <div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8">
          <ul class="info">
            <li><i class="fa fa-phone"></i> +33 1 23 45 67 89</li>
            <li><i class="fa fa-map-marker"></i> 123 Rue Gourmande, Paris 75000</li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-4">
          <ul class="social-links">
            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            <li><a href="#"><i class="fab fa-google"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- Logo -->
                    <a href="index.html" class="logo">
                        <h1>Santé & Gourmandise</h1>
                    </a>
                    <!-- Menu -->
                    <ul class="nav">
                      <li><a href="index.html" class="active">Accueil</a></li>
                      <li><a href="restaurant.html">Restaurant</a></li>
                      <li><a href="pharmacie.html">Pharmacie</a></li>
                      <li><a href="cafe.html">Café</a></li>
                      <li><a href="contact.html">Contact</a></li>
                  </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <!-- Hero Section -->
  <div class="main-banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="caption">
            <h2>Bienvenue chez <span>Santé & Gourmandise</span></h2>
            <p>Découvrez notre triple expertise : cuisine maison, conseils pharmaceutiques et café d'exception</p>
            <div class="main-button">
              <a href="#services">Nos Services</a>
              <a href="contact.html">Nous Contacter</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Services Section -->
  <div class="services section" id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h6>| Nos Espaces</h6>
            <h2>Trois univers complémentaires</h2>
          </div>
        </div>
        
        <!-- Restaurant Card -->
        <div class="col-lg-4 col-md-6">
          <div class="service-card">
            <img src="assets/images/restaurant.jpg" alt="Restaurant" class="img-fluid service-img">
            <div class="card-body">
              <span class="badge restaurant-badge mb-2">Restaurant</span>
              <h4 class="card-title">Cuisine Maison</h4>
              <p class="card-text">Dégustez nos plats préparés avec des produits frais et locaux. Menu du jour et spécialités régionales.</p>
              <div class="d-flex justify-content-between align-items-center">
                <a href="restaurant.html" class="btn btn-sm btn-primary">Voir le menu</a>
                <small class="text-muted">Ouvert 7j/7</small>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Pharmacie Card -->
        <div class="col-lg-4 col-md-6">
          <div class="service-card">
            <img src="assets/images/pharmacie.jpg" alt="Pharmacie" class="img-fluid service-img">
            <div class="card-body">
              <span class="badge pharmacy-badge mb-2">Pharmacie</span>
              <h4 class="card-title">Conseils Santé</h4>
              <p class="card-text">Profitez de conseils pharmaceutiques personnalisés et de produits de qualité dans notre espace santé.</p>
              <div class="d-flex justify-content-between align-items-center">
                <a href="pharmacie.html" class="btn btn-sm btn-primary">Nos services</a>
                <small class="text-muted">Sur rendez-vous</small>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Café Card -->
        <div class="col-lg-4 col-md-6">
          <div class="service-card">
            <img src="assets/images/cafe.jpg" alt="Café" class="img-fluid service-img">
            <div class="card-body">
              <span class="badge cafe-badge mb-2">Café</span>
              <h4 class="card-title">Pause Gourmande</h4>
              <p class="card-text">Découvrez nos cafés d'origine et pâtisseries maison dans un cadre chaleureux et convivial.</p>
              <div class="d-flex justify-content-between align-items-center">
                <a href="cafe.html" class="btn btn-sm btn-primary">Voir la carte</a>
                <small class="text-muted">Terrasse disponible</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Divider -->
  <div class="section-divider"></div>

  <!-- About Section -->
  <div class="about-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="left-content">
            <h6>| Notre Concept</h6>
            <h2>Un lieu unique alliant bien-être et plaisir</h2>
            <p>Fondé en 2010, Santé & Gourmandise est un espace innovant qui réunit trois activités complémentaires autour d'une même philosophie : prendre soin de vous.</p>
            <ul>
              <li>✔ Cuisine maison avec produits bio et locaux</li>
              <li>✔ Pharmacie à taille humaine avec conseils personnalisés</li>
              <li>✔ Café torréfié sur place et pâtisseries artisanales</li>
            </ul>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="right-image">
            <img src="assets/images/concept.jpg" alt="Notre concept" class="img-fluid rounded">
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Divider -->
  <div class="section-divider"></div>

  <!-- Horaires Section -->
  <div class="opening-hours-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h6>| Horaires d'ouverture</h6>
            <h2>Quand nous visiter ?</h2>
          </div>
        </div>
        
        <div class="col-lg-4">
          <div class="hours-card">
            <h4><i class="fas fa-utensils"></i> Restaurant</h4>
            <ul class="opening-hours">
              <li><span>Lundi - Vendredi</span> <span>11h30 - 22h00</span></li>
              <li><span>Samedi</span> <span>10h00 - 23h00</span></li>
              <li><span>Dimanche</span> <span>10h00 - 22h00</span></li>
            </ul>
          </div>
        </div>
        
        <div class="col-lg-4">
          <div class="hours-card">
            <h4><i class="fas fa-prescription-bottle-alt"></i> Pharmacie</h4>
            <ul class="opening-hours">
              <li><span>Lundi - Vendredi</span> <span>8h30 - 20h00</span></li>
              <li><span>Samedi</span> <span>9h00 - 19h00</span></li>
              <li><span>Dimanche</span> <span>10h00 - 13h00</span></li>
            </ul>
          </div>
        </div>
        
        <div class="col-lg-4">
          <div class="hours-card">
            <h4><i class="fas fa-coffee"></i> Café</h4>
            <ul class="opening-hours">
              <li><span>Lundi - Dimanche</span> <span>7h30 - 20h00</span></li>
              <li><span>Brunch</span> <span>Week-end 9h-14h</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="about-footer">
            <h4>Santé & Gourmandise</h4>
            <p>Un concept unique alliant restauration de qualité, conseils santé et café d'exception au cœur de Paris.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="links-footer">
            <h4>Liens utiles</h4>
            <ul>
              <li><a href="restaurant.html">Carte du restaurant</a></li>
              <li><a href="pharmacie.html">Services pharmaceutiques</a></li>
              <li><a href="cafe.html">Notre sélection de cafés</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="contact-footer">
            <h4>Contact rapide</h4>
            <ul>
              <li><i class="fa fa-phone"></i> +33 1 23 45 67 89</li>
              <li><i class="fa fa-envelope"></i> contact@sante-gourmandise.fr</li>
            </ul>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="copyright">
            <p>Copyright © 2023 Santé & Gourmandise. Tous droits réservés.</p>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/custom.js"></script>

</body>
</html>