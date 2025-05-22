@extends("master")
@section("title") Site Livraison Fes @endsection

@section("content")
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
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
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
 @php
            
                $categoriesInformatique = [['title' => 'Ordinateurs portables','img'=>'data:image/jpeg;base64,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','id'=>1],
            ['title' => 'Accessoires PC','img'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSsy4_XGdEUdXzUC0AnwuAOWuu8yzM8-6lLRA&s','id'=>2],
            ['title' => 'Composants PC','img'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQV4a6W1JjNMgEavcje_0gCcyz57q2W96O_Cg&s','id'=>3],
            ['title' => 'Périphériques','img'=>'https://static1.assistancescolaire.com/ele/images/fde07sc04i02.png','id'=>4],
            ['title' => 'Réseaux & Internet','img'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcThk294oPEBUT7MpG6HFfYzKPfa9gCcEanWdA&s','id'=>5],
            ['title' => 'Stockage','img'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSMEUaiUK7cr8-M7bWj4qR6ItKqu7sPBl2cl9Vohku_VABk3BF076wkvfNK2IvcGZmaeCo&usqp=CAU','id'=>6],
            ['title' => 'Support & câblage','img'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR6gXzaK0PAv_wQCk_iu9uAZjaTjyXKhcF9Cg&s','id'=>7],
            ['title' => 'Gaming','img'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ4PL87_dSx0KQHhL7IcxQDiB_SXd1ZFuV_eA&s','id'=>8]];
            @endphp
<!-- Search and Filter Section -->
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
<!-- Wrapper with Flexbox layout -->
<div class="search-filter-container" style="display: flex; gap: 1rem; flex-wrap: wrap; align-items: center;">

    <!-- Search Form -->
    <form action="{{ url('/search') }}" method="POST" class="search-box">
    @csrf    <input 
            type="search" 
            name="search" 
            placeholder="Rechercher des produits..." 
       
        >
        <!-- Preserve category selection -->
       
    </form>

    <!-- Category Filter Form -->
    <form action="{{ url('/categorie') }}" method="POST" class="category-filter">
        <!-- Preserve search input -->
@csrf
        <select name="category" onchange="this.form.submit()">
            <option value="">Toutes les catégories</option>
            @foreach($categoriesInformatique as $categorie)
                <option 
                    value="{{ $categorie['id'] }}" 

                >
                    {{ $categorie['title'] }}
                </option>
            @endforeach
        </select>
    </form>

</div>

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