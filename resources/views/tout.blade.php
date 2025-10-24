@extends("master")
@section("title") Site Livraison Fes @endsection

@section("content")
<style>
    /* Search and Filter Styles */
    .search-filter-container {
        display: flex;
        justify-content: space-between;
        margin-bottom: 2rem;
        padding: 1rem;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    
    .search-box {
        flex: 1;
        margin-right: 1rem;
    }
    
    .category-filter {
        width: 250px;
    }
    
    .search-box input,
    .category-filter select {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 1rem;
    }
    
    /* Category Cards Styles */
    :root {
        --d: 700ms;
        --e: cubic-bezier(0.19, 1, 0.22, 1);
        --font-sans: 'Rubik', sans-serif;
        --font-serif: 'Cardo', serif;
        --primary-color: #2c3e50;
        --accent-color: #e74c3c;
    }

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    .page-header {
        text-align: center;
        margin-bottom: 3rem;
        padding: 0 1rem;
    }

    .page-header h1 {
        font-size: 2.8rem;
        color: var(--primary-color);
        margin-bottom: 1rem;
        font-weight: 700;
    }

    .page-header p {
        font-size: 1.2rem;
        color: #666;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }

    .page-content {
        display: grid;
        grid-gap: 2rem;
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 1rem;
    }

    @media (min-width: 600px) {
        .page-content {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (min-width: 900px) {
        .page-content {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    .card {
        position: relative;
        display: flex;
        align-items: flex-end;
        overflow: hidden;
        padding: 2rem;
        width: 100%;
        text-align: center;
        color: white;
        background-color: white;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        border-radius: 12px;
        min-height: 320px;
        transition: all 0.4s ease;
        cursor: pointer;
        text-decoration: none;
    }

    .card:hover {
        box-shadow: 0 15px 35px rgba(0,0,0,0.2);
        transform: translateY(-5px);
        text-decoration: none;
        color: white;
    }

    @media (min-width: 600px) {
        .card {
            height: 380px;
        }
    }

    .card:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 110%;
        background-size: cover;
        background-position: center;
        transition: transform calc(var(--d) * 1.5) var(--e);
        pointer-events: none;
        border-radius: 12px;
        background-image: var(--bg-image);
    }

    .card:after {
        content: '';
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 200%;
        pointer-events: none;
        background-image: linear-gradient(
            to bottom,
            hsla(0, 0%, 0%, 0) 0%,
            hsla(0, 0%, 0%, 0.8) 100%
        );
        transform: translateY(-50%);
        transition: transform calc(var(--d) * 2) var(--e);
        border-radius: 12px;
    }

    .content {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
        padding: 1.5rem;
        transition: transform var(--d) var(--e);
        z-index: 1;
    }

    .content > * + * {
        margin-top: 1.2rem;
    }

    .title {
        color: white;
        font-size: 1.6rem;
        font-weight: 700;
        line-height: 1.3;
        text-shadow: 0 3px 6px rgba(0,0,0,0.7);
        letter-spacing: 0.5px;
    }

    .copy {
        color: white;
        font-family: var(--font-serif);
        font-size: 1.1rem;
        font-style: italic;
        line-height: 1.5;
        opacity: 0.95;
        text-shadow: 0 2px 4px rgba(0,0,0,0.5);
    }

    .btn {
        cursor: pointer;
        margin-top: 1.5rem;
        padding: 0.9rem 2rem;
        font-size: 0.85rem;
        font-weight: 600;
        letter-spacing: 1px;
        text-transform: uppercase;
        color: white;
        background-color: var(--accent-color);
        border: none;
        border-radius: 6px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 8px rgba(0,0,0,0.3);
        text-decoration: none;
        display: inline-block;
    }

    .btn:hover {
        background-color: #c0392b;
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(0,0,0,0.4);
        color: white;
        text-decoration: none;
    }

    /* Mobile - Always show all content */
    @media (max-width: 599px) {
        .card {
            align-items: center;
        }
        
        .content > *:not(.title) {
            opacity: 1 !important;
            transform: translateY(0) !important;
        }
    }

    /* Desktop hover effects */
    @media (hover: hover) and (min-width: 600px) {
        .card:after {
            transform: translateY(0);
        }
        
        .content {
            transform: translateY(calc(100% - 5rem));
        }
        
        .content > *:not(.title) {
            opacity: 0;
            transform: translateY(1.5rem);
            transition:
                transform var(--d) var(--e),
                opacity var(--d) var(--e);
        }
        
        .card:hover,
        .card:focus-within {
            align-items: center;
        }

        .card:hover:before,
        .card:focus-within:before { 
            transform: translateY(-5%); 
        }
        
        .card:hover:after,
        .card:focus-within:after { 
            transform: translateY(-50%); 
        }

        .card:hover .content,
        .card:focus-within .content {
            transform: translateY(0);
        }

        .card:hover .content > *:not(.title),
        .card:focus-within .content > *:not(.title) {
            opacity: 1;
            transform: translateY(0);
            transition-delay: calc(var(--d) / 6);
        }
    }
</style>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<br>

<!-- Search and Filter Section -->
<div class="search-filter-container" style="display: flex; gap: 1rem; flex-wrap: wrap; align-items: center;">
    <!-- Search Form -->
    <form action="{{ url('/search') }}" method="POST" class="search-box">
        @csrf
        <input 
            type="search" 
            name="search" 
            placeholder="Rechercher des produits..." 
        >
    </form>

    <!-- Category Filter Form -->
    <form action="{{ url('/categorie') }}" method="POST" class="category-filter">
        @csrf
        <select name="category" onchange="this.form.submit()">
            <option value="">Toutes les catégories</option>
            @foreach($categories as $categorie)
                <option value="{{ $categorie->id }}">
                    {{ $categorie->categorie }}
                </option>
            @endforeach
        </select>
    </form>
</div>

<link href="https://fonts.googleapis.com/css?family=Cardo:400i|Rubik:400,700&display=swap" rel="stylesheet">

<div class="page-header">
    <h1>Nos Catégories</h1>
    <p>Découvrez nos produits à travers nos différentes catégories. Survolez les cartes pour plus de détails.</p>
</div>

<main class="page-content">
    @php
    // Define category data with images and descriptions
    $categoryData = [
        [
            'id' => 1,
            'title' => 'Accessoires',
            'copy' => 'Découvrez nos accessoires de qualité pour tous vos besoins',
            'button' => 'Voir les produits',
            'image_url' => 'martin-de-arriba-uf_IDewI6iQ-unsplash.jpg'
        ],
        [
            'id' => 2,
            'title' => 'Offres',
            'copy' => 'Profitez de nos offres spéciales et promotions exclusives',
            'button' => 'Découvrir',
            'image_url' => 'khampha-phimmachak-QRVx6D5fbpE-unsplash.jpg'
        ],
        [
            'id' => 3,
            'title' => 'Bracelets',
            'copy' => 'Explorez notre collection de bracelets élégants et modernes',
            'button' => 'Voir la collection',
            'image_url' => 'diego-castaneda-5LMam0Cn88k-unsplash.jpg'
        ],[
            'id' => 4,
            'title' => 'Anneaux',
            'copy' => 'Explorez notre collection d\'anneaux élégants et modernes',
            'button' => 'Voir la collection',
            'image_url' => 'jackie-tsang-3_YP8_mh-Kg-unsplash.jpg'
        ]
    ];
    @endphp

    @foreach($categoryData as $category)
    <a href="/categorie/{{ $category['id'] }}" class="card" style="--bg-image: url('{{ $category['image_url'] }}')">
        <div class="content">
            <h2 class="title">{{ $category['title'] }}</h2>
            <p class="copy">{{ $category['copy'] }}</p>
            <span class="btn">{{ $category['button'] }}</span>
        </div>
    </a>
    @endforeach
</main>



<div class="contact-content">
<div class="container">

<div class="item " style="margin:10px;width:50%">
                <img src="necklace.png" alt="" style="max-width: 52px;">
                <h6>accessoires

                <br><span>Commander tous les accessoires disponibles</span></h6>
                </div> </div></div>
                <div class="properties section" style="margin:0;padding:0;" style="margin:0;padding:0;">
                <div class="container"> <!-- Open container -->

<div class="row"> <!-- Open row -->
@foreach ($produits as $produit)
@if($produit->categorie_id == 1)
  <div class="col-lg-4 col-md-6"> <!-- Open column -->
  
    <div class="item"> <!-- Open item -->

      <a href="/commander/{{$produit->id}}">
      <img src="{{ asset('storage/'.$produit->image) }}" alt="Produit">



      </a>

      <span class="category">{{$produit->categorie->categorie}}</span>

      <h6>{{$produit->prix}}dhs</h6>

      <h4>
        <a href="property-details.html">{{$produit->nom}}</a>
      </h4>

      <div class="main-button">
        <a href="/comm/{{$produit->id}}">voir les informations</a>
      </div> <!-- Close main-button -->
   

    </div> <!-- Close item --> 

  </div> 
  @endif
  @endforeach
  <!-- Close column -->

</div> <!-- Close row -->

</div> <!-- Close container -->
</div> <!-- Close properties section -->
<div class="contact-content">
<div class="container">

<div class="item " style="margin:10px;width:50%">
                <img src="discount.png" alt="" style="max-width: 52px;">
                <h6>offres
                <br><span>Commander tous les offres
                disponibles</span></h6>
                </div> </div></div>


                <div class="properties section" style="margin:0;padding:0;">
                <div class="container"> <!-- Open container -->

<div class="row"> <!-- Open row -->

@foreach ($produits as $produit)
@if($produit->categorie_id == 2)
  <div class="col-lg-4 col-md-6"> <!-- Open column -->
  
    <div class="item"> <!-- Open item -->

      <a href="/commander/{{$produit->id}}">
      <img src="{{ asset('storage/'.$produit->image) }}" alt="Produit">



      </a>

      <span class="category">{{$produit->categorie->categorie}}</span>

      <h6>{{$produit->prix}}dhs</h6>

      <h4>
        <a href="property-details.html">{{$produit->nom}}</a>
      </h4>

      <div class="main-button">
        <a href="/comm/{{$produit->id}}">voir les informations</a>
      </div> <!-- Close main-button -->
   

    </div> <!-- Close item --> 

  </div> 
  @endif
  @endforeach

</div> <!-- Close row -->

</div> <!-- Close container -->
</div><!-- Close properties section -->

<div class="contact-content">
<div class="container">

<div class="item " style="margin:10px;width:50%">
                <img src="bracelet.png" alt="" style="max-width: 52px;">
                <h6>bracelets
                <br><span>Commander tous les Bracelets
                disponibles</span></h6>
                </div> </div></div>


                <div class="properties section" style="margin:0;padding:0;">
                <div class="container"> <!-- Open container -->

<div class="row"> <!-- Open row -->

@foreach ($produits as $produit)
@if($produit->categorie_id == 3)
  <div class="col-lg-4 col-md-6"> <!-- Open column -->
  
    <div class="item"> <!-- Open item -->

      <a href="/commander/{{$produit->id}}">
      <img src="{{ asset('storage/'.$produit->image) }}" alt="Produit">



      </a>

      <span class="category">{{$produit->categorie->categorie}}</span>

      <h6>{{$produit->prix}}dhs</h6>

      <h4>
        <a href="property-details.html">{{$produit->nom}}</a>
      </h4>

      <div class="main-button">
        <a href="/comm/{{$produit->id}}">voir les informations</a>
      </div> <!-- Close main-button -->
   

    </div> <!-- Close item --> 

  </div> 
  @endif
  @endforeach

</div> <!-- Close row -->

</div> <!-- Close container -->
</div>



<div class="contact-content">
<div class="container">

<div class="item " style="margin:10px;width:50%">
                <img src="ring.png" alt="" style="max-width: 52px;">
                <h6>Anneaux
                <br><span>Commander tous les Anneaux
                disponibles</span></h6>
                </div> </div></div>


                <div class="properties section" style="margin:0;padding:0;">
                <div class="container"> <!-- Open container -->

<div class="row"> <!-- Open row -->

@foreach ($produits as $produit)
@if($produit->categorie_id == 4)
  <div class="col-lg-4 col-md-6"> <!-- Open column -->
  
    <div class="item"> <!-- Open item -->

      <a href="/commander/{{$produit->id}}">
      <img src="{{ asset('storage/'.$produit->image) }}" alt="Produit">



      </a>

      <span class="category">{{$produit->categorie->categorie}}</span>

      <h6>{{$produit->prix}}dhs</h6>

      <h4>
        <a href="property-details.html">{{$produit->nom}}</a>
      </h4>

      <div class="main-button">
        <a href="/comm/{{$produit->id}}">voir les informations</a>
      </div> <!-- Close main-button -->
   

    </div> <!-- Close item --> 

  </div> 
  @endif
  @endforeach

</div> <!-- Close row -->

</div> <!-- Close container -->
</div>






@endsection
