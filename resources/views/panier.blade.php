@extends('master')
@section('title')
  Panier - Livraison Fès
@endsection
@section("content")
  <!-- Cart Section -->
  <div class="contact-page section">
    <div class="container">
      <div class="row">
        
          <div class="section-heading">
            <h6>| Vos plats sélectionnés</h6>
            <h2>Récapitulatif de commande</h2>
          </div>
          
          <!-- Cart Items -->
          <div class="cart-item">
              <div class="row align-items-center">
                <div class="col-2">
                  <img src="assets/images/plat2.jpg" alt="Plat 2" class="img-fluid rounded">
                </div>
                <div class="col-4">
                  <h5>pizza dinde</h5>
                  <p>pizza amrani</p>
                 
                </div>
                <div class="col-3">
                  <div class="quantity">

                    <span class="mx-2">2</span>

                  </div>
                </div>
                <div class="col-2 text-end">
                  <span class="price">40dhs</span>
                </div>
                <div class="col-1 text-end">
                  <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                </div>
              </div>
            <hr>
            
            <div class="cart-item">
              <div class="row align-items-center">
                <div class="col-2">
                  <img src="assets/images/plat2.jpg" alt="Plat 2" class="img-fluid rounded">
                </div>
                <div class="col-4">
                  <h5>tacos poulet</h5>
                  <p>mr tacos</p> 
                 
                </div>
                <div class="col-3">
                  <div class="quantity">

                    <span class="mx-2">2</span>

                  </div>
                </div>
                <div class="col-2 text-end">
                  <span class="price">40dhs</span>
                </div>
                <div class="col-1 text-end">
                  <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                </div>
              </div>
            </div>
            <hr>
            
            
            </div>
          </div>
        </div>
        
        
       
            
       
      </div>
    </div>
  </div>
  @endsection