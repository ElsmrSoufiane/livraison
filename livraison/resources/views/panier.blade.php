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
          @foreach($commandes as $commande)
          <!-- Cart Items -->
          <div class="cart-item">
              <div class="row align-items-center">
                <div class="col-2">
                  @foreach($produits as $produit)
                  @if($produit->id == $commande->id_produit)
                  <img src="{{asset('storage/'.$produit->image)}}"  class="img-fluid rounded">
                </div>
                <div class="col-4">
                  <h5>{{$produit->nom}}</h5>
                  @foreach($fournisseurs as $fournisseur)
                  @if($fournisseur->id==$produit->fournisseur_id)
                  <p>{{$fournisseur->nom}}</p>
                 @endif
                  @endforeach
                </div>
                <div class="col-3">
                  <div class="quantity">

                    <span class="mx-2">{{$commande->quantite}}</span>

                  </div>
                </div>
                <div class="col-2 text-end">
                  <span class="price">{{$commande->prix_total}}dhs</span>
                </div>
                <div class="col-1 text-end"> <a href="/deleteCommande/{{$commande->id}}" >  <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></a>
                
                </div>
              </div>
            <hr>
            @endif
            @endforeach
            @endforeach

          
        
        
       
            
       
      </div>
    </div>
  </div>
  @endsection