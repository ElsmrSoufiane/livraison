@extends("master")
@section("content")
    
  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="breadcrumb"><a href="#">Accueil</a>  /  À Propos</span>
          <h3>Notre Histoire</h3>
        </div>
      </div>
    </div>
  </div>

  <div class="single-property section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="main-image">
            <img src="shop.jpg" alt="Intérieur de notre boutique">
          </div>
          <div class="main-content">
            <span class="category">Mode & Accessoires</span>
            <h4>Créateurs d'Élégance Depuis 2010</h4>
            <p>Bienvenue chez <strong>Boutique Élégance</strong>, votre destination privilégiée pour une mode raffinée et des accessoires uniques. Fondée en 2010 par deux passionnés de style, nous avons évolué d'une petite boutique à une adresse incontournable pour ceux qui recherchent qualité et originalité.
            
            <br><br>Notre collection est soigneusement sélectionnée parmi des créateurs émergents et des marques établies. Chaque pièce dans notre boutique a été choisie pour son design, son savoir-faire artisanal et son caractère unique. Nous croyons en une mode responsable qui allie esthétique et éthique.</p>
          </div> 
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Notre Philosophie
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Chez <strong>Élégance</strong>, nous suivons trois principes fondamentaux : <code>qualité exceptionnelle</code>, <code>style intemporel</code> et <code>production éthique</code>. Nous travaillons directement avec des créateurs qui partagent nos valeurs de respect de l'environnement et des conditions de travail équitables.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Notre Équipe
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Notre équipe de stylistes et conseillers en mode est là pour vous guider dans vos choix. Chaque membre partage une passion pour le style et un engagement à vous aider à trouver des pièces qui reflètent votre personnalité. Nous organisons régulièrement des formations pour rester à la pointe des tendances.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Engagement Local
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Nous sommes fiers de soutenir les créateurs locaux. 30% de notre collection provient de designers français indépendants. Nous organisons également des événements mensuels pour mettre en lumière les talents émergents et reversons une partie de nos bénéfices à des œuvres caritatives locales.
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="info-table">
            <ul>
              <li>
                <img src="customer-review.png" alt="" style="max-width: 52px;">
                <h4>13+<br><span>Ans d'Expérience</span></h4>
              </li>
              
              <li>
                <img src="satisfaction.png" alt="" style="max-width: 52px;">
                <h4>100%<br><span>Satisafaction</span></h4>
              </li>
              <li>
                <img src="fast-delivery.png" alt="" style="max-width: 52px;">
                <h4>Livraison<br><span>Offerte</span></h4>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  
    </div>
  </div>
@endsection