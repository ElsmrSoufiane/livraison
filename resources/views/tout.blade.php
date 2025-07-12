@extends("master")
@section("title") Site de Vêtements Marocains Traditionnels @endsection

@section("content")
<!-- Dans le <head> -->
<link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=El+Messiri:wght@400;600&display=swap" rel="stylesheet">


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
        .search-filter-container {
            flex-direction: column;
        }
        
        .search-box {
            margin-right: 0;
            margin-bottom: 1rem;
        }
        
        .category-filter {
            width: 100%;
        }
        
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
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@php
$categoriesVetements = [

    ['title' => 'Jabadors', 'img' => 'https://example.com/jabador.jpg', 'id' => 1],


    ['title' => 'Accessoires', 'img' => 'https://example.com/accessoires.jpg', 'id' => 2],
  
@endphp

<!-- Section Recherche et Filtres -->
<div class="search-filter-container">
    <!-- Formulaire de recherche -->
    <form action="{{ url('/search') }}" method="POST" class="search-box">
        @csrf
        <input type="search" name="search" placeholder="Rechercher des vêtements...">
    </form>

    <!-- Filtre par catégorie -->
    <form action="{{ url('/categorie') }}" method="POST" class="category-filter">
        @csrf
        <select name="category" onchange="this.form.submit()">
            <option value="">Toutes les catégories</option>
            @foreach($categoriesVetements as $categorie)
                <option value="{{ $categorie['id'] }}">
                    {{ $categorie['title'] }}
                </option>
            @endforeach
        </select>
    </form>
</div>

<!-- Section Catégories -->
<section class="category-section">
    <div class="container">
        <div class="category-header">
            <h2>Nos Collections Traditionnelles</h2>
            <p>Découvrez l'artisanat marocain à travers nos vêtements traditionnels faits main</p>
        </div>

        <div class="category-grid">
            @foreach($categoriesVetements as $categorie)
               <a href="/categorie/{{ $categorie['id'] }}"> 
                   <div class="category-card">
                       <div class="category-img-container">
                           <span class="category-badge">Ta9lidi</span>
                           <img src="{{ $categorie['img'] }}" alt="{{ $categorie['title'] }}" class="category-img">
                       </div>
                       <div class="category-content">
                           <div>
                               <h3 class="category-title">{{ $categorie['title'] }}</h3>
                               <p class="category-desc">Collection exclusive de {{ strtolower($categorie['title']) }} artisanaux</p>
                           </div>
                           <div class="category-footer">
                               <span class="category-count"><i class="fas fa-tshirt"></i> Plusieurs modèles</span>
                           </div>
                       </div>
                   </div>
               </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Section Produits par Catégorie -->
@foreach($categoriesVetements as $categorie)
<div class="contact-content">
    <div class="container">
        <div class="item" style="margin:10px;width:50%">
            <img src="icon-{{ $categorie['id'] }}.png" alt="" style="max-width: 52px;">
            <h6>{{ $categorie['title'] }}
            <br><span>Découvrez notre collection de {{ strtolower($categorie['title']) }}</span></h6>
        </div> 
    </div>
</div>

<div class="properties section" style="margin:0;padding:0;">
    <div class="container">
        <div class="row">
            @foreach ($produits as $produit)
            @if($produit->categorie_id == $categorie['id'])
            <div class="col-lg-4 col-md-6">
                <div class="item">
                    <a href="/commander/{{$produit->id}}">
                        <img src="{{ asset('storage/'.$produit->image) }}" alt="{{$produit->nom}}">
                    </a>
                    <span class="category">{{$produit->categorie->categorie}}</span>
                    <h6>{{$produit->prix}} dhs</h6>
                    <h4>
                        <a href="property-details.html">{{$produit->nom}}</a>
                    </h4>
                    <div class="main-button">
                        <a href="/comm/{{$produit->id}}">Voir les détails</a>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>
@endforeach

@endsection