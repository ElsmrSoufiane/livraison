<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Inscription - Villa Agency</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
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
            <li><i class="fa fa-envelope"></i> support@villa-agency.com</li>
            <li><i class="fa fa-map"></i> Lyon, 69002</li>
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
                      <li><a href="login.html">Connexion</a></li>
                      <li><a href="register.html" class="active">Inscription</a></li>
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
          <span class="breadcrumb"><a href="#">Accueil</a> / Inscription</span>
          <h3>Créer un Compte</h3>
        </div>
      </div>
    </div>
  </div>

  <div class="contact-page section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <form id="registration-form" action="#" method="post">
            <div class="row">
              <!-- Colonne Gauche -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="nom">Nom Complet</label>
                  <input type="text" 
                         class="form-control" 
                         id="nom" 
                         name="nom"
                         placeholder="Jean Dupont"
                         required>
                </div>

                <div class="form-group">
                  <label for="email">Adresse Email</label>
                  <input type="email" 
                         class="form-control" 
                         id="email" 
                         name="email"
                         placeholder="exemple@email.com"
                         pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                         required>
                </div>

                <div class="form-group">
                  <label for="telephone">Téléphone</label>
                  <input type="tel" 
                         class="form-control" 
                         id="telephone" 
                         name="telephone"
                         placeholder="06 12 34 56 78"
                         pattern="[0-9]{10}">
                </div>
              </div>

              <!-- Colonne Droite -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="adresse">Adresse</label>
                  <input type="text" 
                         class="form-control" 
                         id="adresse" 
                         name="adresse"
                         placeholder="123 Rue de la République">
                </div>

                <div class="form-group">
                  <label for="mot_de_passe">Mot de passe</label>
                  <input type="password" 
                         class="form-control" 
                         id="mot_de_passe" 
                         name="mot_de_passe"
                         placeholder="••••••••"
                         minlength="8"
                         required>
                </div>

                <div class="form-group">
                  <label for="confirmation_mdp">Confirmation</label>
                  <input type="password" 
                         class="form-control" 
                         id="confirmation_mdp" 
                         name="confirmation_mdp"
                         placeholder="••••••••"
                         minlength="8"
                         required>
                </div>
              </div>

              <div class="col-lg-12 text-center">
                <div class="form-check mt-3">
                  <input type="checkbox" 
                         class="form-check-input" 
                         id="conditions" 
                         required>
                  <label class="form-check-label" for="conditions">
                    J'accepte les <a href="#">conditions d'utilisation</a>
                  </label>
                </div>

                <button type="submit" 
                        class="btn orange-button mt-4"
                        style="width: 100%">
                  <i class="fa fa-user-plus"></i> S'inscrire
                </button>

                <p class="mt-3">
                  Déjà inscrit? <a href="login.html">Connectez-vous ici</a>
                </p>
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

  <!-- Validation Mot de Passe -->
  <script>
    document.getElementById('registration-form').addEventListener('submit', function(e) {
      let mdp = document.getElementById('mot_de_passe').value;
      let confirmation = document.getElementById('confirmation_mdp').value;
      
      if(mdp !== confirmation) {
        alert('Les mots de passe ne correspondent pas!');
        e.preventDefault();
      }
    });
  </script>

</body>
</html>