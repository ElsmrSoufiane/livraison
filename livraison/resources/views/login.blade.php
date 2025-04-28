<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Connexion - Villa Agency</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="assets/css/owl.css">
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

  <div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8">
          <ul class="info">
            <li><i class="fa fa-envelope"></i> support@villa.fr</li>
            <li><i class="fa fa-map"></i> Marseille, 13001</li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-4">
          <ul class="social-links">
            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
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
                    <a href="index.html" class="logo">
                        <h1>Villa</h1>
                    </a>
                    <ul class="nav">
                      <li><a href="index.html">Accueil</a></li>
                      <li><a href="properties.html">Biens</a></li>
                      <li><a href="contact.html">Contact</a></li>
                      <li><a href="login.html" class="active">Connexion</a></li>
                      <li><a href="register.html">Inscription</a></li>
                  </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                </nav>
            </div>
        </div>
    </div>
  </header>

  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="breadcrumb"><a href="#">Accueil</a> / Connexion</span>
          <h3>Accéder à votre compte</h3>
        </div>
      </div>
    </div>
  </div>

  <div class="contact-page section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <form id="login-form" action="#" method="post">
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                  <label for="email">Adresse Email</label>
                  <input type="email" 
                         class="form-control" 
                         id="email" 
                         name="email"
                         placeholder="exemple@email.com"
                         required>
                </div>
              </div>

              <div class="col-lg-12">
                <div class="form-group">
                  <label for="password">Mot de passe</label>
                  <input type="password" 
                         class="form-control" 
                         id="password" 
                         name="password"
                         placeholder="••••••••"
                         minlength="8"
                         required>
                </div>
              </div>

              <div class="col-lg-12">
                <div class="row align-items-center">
                  <div class="col-lg-6 col-md-6">
                    <div class="form-check">
                      <input class="form-check-input" 
                             type="checkbox" 
                             id="remember">
                      <label class="form-check-label" for="remember">
                        Se souvenir de moi
                      </label>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 text-end">
                    <a href="forgot-password.html" class="text-orange">Mot de passe oublié ?</a>
                  </div>
                </div>
              </div>

              <div class="col-lg-12 mt-4">
                <button type="submit" 
                        class="btn orange-button w-100">
                  <i class="fa fa-sign-in-alt"></i> Se connecter
                </button>
              </div>

              <div class="col-lg-12 text-center mt-3">
                <p>Pas encore membre ? <a href="register.html" class="text-orange">Créer un compte</a></p>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="col-lg-12">
        <p>© 2024 Villa Agency. Tous droits réservés.<br>
           <a rel="nofollow" href="https://templatemo.com" target="_blank">Design par TemplateMo</a></p>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/custom.js"></script>

</body>
</html>