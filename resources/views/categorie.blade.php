@extends("master")
@section("title") Site Livraison Fes @endsection

@section("content")
<style>
    /* Enhanced Category Cards */
    .category-section {
        padding: 4rem 0;
        background: #f9fafb;
    }
    
    .category-header {
        text-align: center;
        margin-bottom: 3rem;
    }
    
    .category-header h2 {
        font-size: 2.5rem;
        font-weight: 700;
        background: linear-gradient(to right, #fc7f09, #ff4d4d);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 1rem;
    }
    
    .category-header p {
        color: #6b7280;
        font-size: 1.1rem;
        max-width: 700px;
        margin: 0 auto;
    }
    
    .category-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
    }
    
    .category-card {
        position: relative;
        border-radius: 16px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        height: 360px;
        background: white;
    }
    
    .category-img-container {
        height: 65%;
        overflow: hidden;
        position: relative;
    }
    
    .category-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.8s ease;
    }
    
    .category-badge {
        position: absolute;
        top: 1rem;
        right: 1rem;
        background: rgba(255,255,255,0.9);
        padding: 0.5rem 1rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.9rem;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        z-index: 2;
    }
    
    .category-content {
        padding: 1.5rem;
        height: 35%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    
    .category-title {
        font-size: 1.4rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        color: #111827;
    }
    
    .category-desc {
        color: #6b7280;
        font-size: 0.95rem;
        margin-bottom: 1.2rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .category-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .category-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.6rem 1.5rem;
        background: linear-gradient(to right, #fc7f09, #ff4d4d);
        color: white;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(252, 127, 9, 0.3);
    }
    
    .category-btn i {
        font-size: 0.9rem;
    }
    
    .category-count {
        color: #6b7280;
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        gap: 0.3rem;
    }
    
    /* Hover Effects */
    .category-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    }
    
    .category-card:hover .category-img {
        transform: scale(1.1);
    }
    
    .category-card:hover .category-btn {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(252, 127, 9, 0.4);
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .category-grid {
            grid-template-columns: 1fr;
        }
        
        .category-card {
            height: 320px;
        }
        
        .category-header h2 {
            font-size: 2rem;
        }
    }
</style>

<section class="category-section">
    <div class="container">
        <div class="category-header">
            <h2>{{$categoriee}}</h2>

        </div>

       
    </div>
</section>

<div class="contact-content">
<div class="container">


                <div class="properties section" style="margin:0;padding:0;" style="margin:0;padding:0;">
                <div class="container"> <!-- Open container -->

<div class="row"> <!-- Open row -->
@if($produits->count() == 0)
  <div class="col-lg-12 col-md-12 alert-secondary">
    <h2 style="text-align: center;">Aucun produit trouvé</h2>
    </div>
  @endif
@foreach ($produits as $produit)

  <div class="col-lg-4 col-md-6"> <!-- Open column -->
  
    <div class="item"> <!-- Open item -->

      <a href="/commander/{{$produit->id}}">
      <img src="{{ asset('storage/' . $produit->image) }}" alt="Produit">



      </a>
@foreach($fournisseurs as $fournisseur)
@if($produit->fournisseur_id == $fournisseur->id)
      <span class="category">{{$fournisseur->nom}}</span>
      @endif
@endforeach
      <h6>{{$produit->prix}}dhs</h6>

      <h4>
        <a href="property-details.html">{{$produit->nom}}</a>
      </h4>

      <div class="main-button">
        <a href="/commander/{{$produit->id}}"><i class="fa fa-shopping-cart"></i></a>
      </div> <!-- Close main-button -->
      @include("review");

    </div> <!-- Close item -->

  </div> 

  @endforeach
  <!-- Close column -->

</div> <!-- Close row -->

</div> <!-- Close container -->



@endsection