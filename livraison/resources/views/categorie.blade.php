<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Restaurant | Nos Catégories</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <style>
        .category-card {
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        .category-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }
        .category-img {
            height: 200px;
            object-fit: cover;
        }
        .category-body {
            padding: 20px;
            background: #fff;
        }
        .badge-count {
            background: #f35525;
            color: white;
            border-radius: 50px;
            padding: 5px 10px;
            font-size: 12px;
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
            <li><i class="fa fa-envelope"></i> contact@restaurant.com</li>
            <li><i class="fa fa-map"></i> Paris, France 75000</li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-4">
          <ul class="social-links">
            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            <li><a href="#"><i class="fab fa-tripadvisor"></i></a></li>
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
                        <h1>Restaurant</h1>
                    </a>
                    <!-- Menu -->
                    <ul class="nav">
                      <li><a href="index.html">Accueil</a></li>
                      <li><a href="categories.html" class="active">Menu</a></li>
                      <li><a href="reservation.html">Réservation</a></li>
                      <li><a href="cart.html">Panier</a></li>
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

  <!-- Page Heading -->
  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="breadcrumb"><a href="index.html">Accueil</a> / Menu</span>
          <h3>Nos Catégories</h3>
        </div>
      </div>
    </div>
  </div>

  <!-- Categories Section -->
  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h6>| Notre Menu</h6>
            <h2>Découvrez nos spécialités</h2>
          </div>
        </div>
        
        <!-- Catégorie 1 -->
        <div class="col-lg-4 col-md-6">
          <div class="category-card">
            <img src="assets/images/entrees.jpg" alt="Entrées" class="img-fluid category-img">
            <div class="category-body">
              <h4>Entrées</h4>
              <p>Nos délicieuses entrées maison pour commencer votre repas</p>
              <div class="d-flex justify-content-between align-items-center">
                <a href="plats.html?category=entrees" class="btn btn-sm btn-primary">Voir les plats</a>
                <span class="badge-count">12 plats</span>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Catégorie 2 -->
        <div class="col-lg-4 col-md-6">
          <div class="category-card">
            <img src="assets/images/plats-principaux.jpg" alt="Plats Principaux" class="img-fluid category-img">
            <div class="category-body">
              <h4>Plats Principaux</h4>
              <p>Nos spécialités culinaires préparées avec des produits frais</p>
              <div class="d-flex justify-content-between align-items-center">
                <a href="plats.html?category=plats" class="btn btn-sm btn-primary">Voir les plats</a>
                <span class="badge-count">18 plats</span>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Catégorie 3 -->
        <div class="col-lg-4 col-md-6">
          <div class="category-card">
            <img src="assets/images/desserts.jpg" alt="Desserts" class="img-fluid category-img">
            <div class="category-body">
              <h4>Desserts</h4>
              <p>Pour terminer en beauté votre repas</p>
              <div class="d-flex justify-content-between align-items-center">
                <a href="plats.html?category=desserts" class="btn btn-sm btn-primary">Voir les plats</a>
                <span class="badge-count">8 plats</span>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Catégorie 4 -->
        <div class="col-lg-4 col-md-6">
          <div class="category-card">
            <img src="assets/images/boissons.jpg" alt="Boissons" class="img-fluid category-img">
            <div class="category-body">
              <h4>Boissons</h4>
              <p>Vins, cocktails et boissons sans alcool</p>
              <div class="d-flex justify-content-between align-items-center">
                <a href="plats.html?category=boissons" class="btn btn-sm btn-primary">Voir les plats</a>
                <span class="badge-count">24 choix</span>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Catégorie 5 -->
        <div class="col-lg-4 col-md-6">
          <div class="category-card">
            <img src="assets/images/menus.jpg" alt="Menus" class="img-fluid category-img">
            <div class="category-body">
              <h4>Menus Complets</h4>
              <p>Nos suggestions du chef à prix avantageux</p>
              <div class="d-flex justify-content-between align-items-center">
                <a href="plats.html?category=menus" class="btn btn-sm btn-primary">Voir les plats</a>
                <span class="badge-count">5 menus</span>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Catégorie 6 -->
        <div class="col-lg-4 col-md-6">
          <div class="category-card">
            <img src="assets/images/enfants.jpg" alt="Enfants" class="img-fluid category-img">
            <div class="category-body">
              <h4>Menu Enfant</h4>
              <p>Spécialement conçu pour les plus jeunes</p>
              <div class="d-flex justify-content-between align-items-center">
                <a href="plats.html?category=enfants" class="btn btn-sm btn-primary">Voir les plats</a>
                <span class="badge-count">6 plats</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="col-lg-12">
        <p>Copyright © 2023 Restaurant. Tous droits réservés.</p>
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