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
            <img src="https://i.ibb.co/twc251yv/Whats-App-Image-2025-10-27-at-12-07-23-1.jpg" alt="Atelier M-CREATION - Création de bijoux artisanaux">
          </div>
          <div class="main-content">
            <span class="category">Bijoux Artisanaux & Pierres Naturelles</span>
            <h4>Créateurs de Bijoux Uniques Depuis Nos Débuts</h4>
            <p>Bienvenue chez <strong>M-CREATION</strong>, votre créateur de bijoux faits main en pierres naturelles. Fondée par des passionnés d'artisanat et de minéralogie, notre atelier s'est consacré à créer des pièces uniques qui subliment votre style personnel.
            
            <br><br>Chaque bijou est soigneusement conçu et réalisé à la main dans notre atelier, avec des pierres naturelles sélectionnées pour leur beauté et leur énergie unique. Nous croyons en une création responsable qui allie esthétique, authenticité et connexion avec la nature.</p>
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
                  Chez <strong>M-CREATION</strong>, nous suivons trois principes fondamentaux : <code>création artisanale</code>, <code>pierres naturelles authentiques</code> et <code>pièces uniques</code>. Chaque bijou est conçu avec passion et réalisé main, garantissant son caractère exclusif et sa connexion avec les énergies naturelles des pierres.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Notre Savoir-Faire Artisanal
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Notre équipe d'artisans passionnés maîtrise les techniques traditionnelles de création de bijoux. Chaque pièce est travaillée avec soin, de la sélection des pierres naturelles à la finition, créant des bijoux qui racontent une histoire et portent une énergie unique.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Engagement Qualité
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Nous nous engageons à utiliser exclusivement des pierres naturelles et des matériaux de qualité. Chaque bijou est créé spécialement pour vous, avec une attention particulière portée aux détails et à la symbolique des pierres choisies.
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="info-table">
            <ul>
  <li>
    <i class="fas fa-hands" style="font-size: 32px; color: #d4af37;"></i>
    <h4>100%<br><span>Fait Main</span></h4>
  </li>
  <li>
    <i class="fas fa-mountain" style="font-size: 32px; color: #d4af37;"></i>
    <h4>Pierres<br><span>Naturelles</span></h4>
  </li>
  <li>
    <i class="fas fa-snowflake" style="font-size: 32px; color: #d4af37;"></i>
    <h4>Pièces<br><span>Uniques</span></h4>
  </li>
  <li>
    <i class="fas fa-smile" style="font-size: 32px; color: #d4af37;"></i>
    <h4>100%<br><span>Satisfaction</span></h4>
  </li>
</ul>
          </div>
          <div class="contact-info">
            <h4>Rejoignez Notre Univers</h4>
            <div class="social-links">
              <a href="#" class="social-link">Facebook</a>
              <a href="https://instagram.com/m_mcreationn" class="social-link">Instagram</a>
            </div>
            <div class="contact-details">
              <p><strong>Téléphone:</strong> +212 613-060259</p>
              <p><strong>Email:</strong> contact@m-creation.com</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="brand-message text-center">
            <h3>"Des bijoux faits main en pierres naturelles, créés avec passion pour sublimer votre style unique."</h3>
            <p class="signature">- M-CREATION</p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
