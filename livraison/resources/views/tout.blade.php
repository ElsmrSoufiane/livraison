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
            <h2>Explore Our Categories</h2>
            <p>Discover the finest selection of restaurants, patisseries, pharmacies and fresh markets in Fes</p>
        </div>
        
        <div class="category-grid">
            <!-- Restaurants -->
            <div class="category-card">
                <div class="category-img-container">
                    <span class="category-badge">24/7 Delivery</span>
                    <img src="https://images.pexels.com/photos/262978/pexels-photo-262978.jpeg" 
                         alt="Restaurants in Fes" 
                         class="category-img">
                </div>
                <div class="category-content">
                    <div>
                        <h3 class="category-title">Premium Restaurants</h3>
                        <p class="category-desc">Discover the best culinary experiences from traditional Moroccan to international cuisine</p>
                    </div>
                    <div class="category-footer">
                        <span class="category-count">
                            <i class="fas fa-store"></i> 28 places
                        </span>
                        <a href="/restaurants" class="category-btn">
                            <i class="fas fa-arrow-right"></i> Explore
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Patisserie -->
            <div class="category-card">
                <div class="category-img-container">
                    <span class="category-badge">Sweet Treats</span>
                    <img src="https://images.pexels.com/photos/461326/pexels-photo-461326.jpeg" 
                         alt="Moroccan pastries" 
                         class="category-img">
                </div>
                <div class="category-content">
                    <div>
                        <h3 class="category-title">Artisan Patisserie</h3>
                        <p class="category-desc">Traditional Moroccan sweets and French-inspired pastries made with love</p>
                    </div>
                    <div class="category-footer">
                        <span class="category-count">
                            <i class="fas fa-store"></i> 15 bakeries
                        </span>
                        <a href="/patisserie" class="category-btn">
                            <i class="fas fa-arrow-right"></i> Discover
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Pharmacy -->
            <div class="category-card">
                <div class="category-img-container">
                    <span class="category-badge">30min Delivery</span>
                    <img src="https://images.pexels.com/photos/3992933/pexels-photo-3992933.jpeg" 
                         alt="Pharmacy delivery" 
                         class="category-img">
                </div>
                <div class="category-content">
                    <div>
                        <h3 class="category-title">Pharmacy</h3>
                        <p class="category-desc">Get your medications delivered quickly with our express service</p>
                    </div>
                    <div class="category-footer">
                        <span class="category-count">
                            <i class="fas fa-store"></i> 12 pharmacies
                        </span>
                        <a href="/pharmacy" class="category-btn">
                            <i class="fas fa-arrow-right"></i> Order
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Fresh Market -->
            <div class="category-card">
                <div class="category-img-container">
                    <span class="category-badge">Organic</span>
                    <img src="https://images.pexels.com/photos/2252584/pexels-photo-2252584.jpeg" 
                         alt="Fresh market" 
                         class="category-img">
                </div>
                <div class="category-content">
                    <div>
                        <h3 class="category-title">Fresh Market</h3>
                        <p class="category-desc">Seasonal fruits and vegetables sourced directly from local farmers</p>
                    </div>
                    <div class="category-footer">
                        <span class="category-count">
                            <i class="fas fa-store"></i> 8 suppliers
                        </span>
                        <a href="/market" class="category-btn">
                            <i class="fas fa-arrow-right"></i> Shop
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
                <div class="properties section" style="margin:0;padding:0;" style="margin:0;padding:0;">
                <div class="container"> <!-- Open container -->

<div class="row"> <!-- Open row -->
@foreach ($produits as $produit)
@if($produit->categorie_id == 3)
  <div class="col-lg-4 col-md-6"> <!-- Open column -->
  
    <div class="item"> <!-- Open item -->

      <a href="/commander/{{$produit->id}}">
      <img src="{{ asset('storage/' . $produit->image) }}" alt="Produit">



      </a>
@foreach($categories as $categorie)
@if($produit->categorie_id == $categorie->id)
      <span class="category">{{$categorie->categorie}}</span>
      @endif
@endforeach
      <h6>{{$produit->prix}}dhs</h6>

      <h4>
        <a href="property-details.html">{{$produit->nom}}</a>
      </h4>

      <div class="main-button">
        <a href="/commander/{{$produit->id}}"><i class="fa fa-shopping-cart"></i></a>
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
                <img src="icons8-potato-50.png" alt="" style="max-width: 52px;">
                <h6>fruits et legumes <br><span>Commander tous les fruits et légumes disponibles</span></h6>
                </div> </div></div>


                <div class="properties section" style="margin:0;padding:0;">
                <div class="container"> <!-- Open container -->

<div class="row"> <!-- Open row -->

@foreach ($produits as $produit)

@if($produit->categorie_id == 4)
  <div class="col-lg-4 col-md-6"> <!-- Open column -->
  
    <div class="item"> <!-- Open item -->

      <a href="/commander/{{$produit->id}}">
      <img src="{{ asset('storage/' . $produit->image) }}" alt="Produit">

      </a>

      @foreach($categories as $categorie)
@if($produit->categorie_id == $categorie->id)
      <span class="category">{{$categorie->categorie}}</span>
      @endif
@endforeach

      <h6>{{$produit->prix}}dhs pour 1kg</h6>

      <h4>
        <a href="/commander/{{$produit->id}}">{{$produit->nom}}</a>
      </h4>

      <div class="main-button">
        <a href="/commander/{{$produit->id}}"><i class="fa fa-shopping-cart"></i></a>
      </div> <!-- Close main-button -->

    </div> <!-- Close item -->

  </div> <!-- Close column -->
   @endif
   @endforeach

</div> <!-- Close row -->

</div> <!-- Close container -->
</div> <!-- Close properties section -->
<div class="contact-content">
<div class="container">
<div class="item " style="margin:10px;width:50%">
                <img src="icons8-restaurant-50.png" alt="" style="max-width: 52px;">
                <h6>restaurants<br><span>Tu peux consulter ton restaurant préféré ici.</span></h6>
                </div> </div></div>
                <div class="row d-flex justify-content-evenly">
    <figure class="col-md-3" style="--i:rgba(249, 161, 54, 0.78)">
    <img src="https://media.istockphoto.com/id/1442417585/fr/photo/personne-recevant-un-morceau-de-pizza-au-pepperoni-au-fromage.jpg?s=612x612&w=0&k=20&c=xNz2rodZQQARx16BlXTkht9E19aw4ziOMm6UOjW5DKM=" alt="pizza">
    <figcaption>pizza</figcaption>
</figure>
<figure class="col-md-3" style="--i:rgba(249, 161, 54, 0.78)" >
    <img src="https://t3.ftcdn.net/jpg/01/75/23/70/360_F_175237098_WYLhof7P2cH94S4EQDzdofpvdWe4pziB.jpg" alt="tacos">
    <figcaption>tacos</figcaption></figure>

<figure class="col-md-3" style="--i:rgba(249, 161, 54, 0.78)">
    <img src="https://t3.ftcdn.net/jpg/03/09/85/36/360_F_309853648_yJJrVCYncv1D4raXzSH39WUlrRMLEwv3.jpg" alt="shawarma">
    <figcaption>shawarma</figcaption></figure>
</div>
<div class="contact-content">
<div class="container">
<div class="item " style="margin:10px;width:50%">
                <img src="icons8-dessert-50.png" alt="" style="max-width: 52px;">
                <h6>patisserie<br><span>Tu peux consulter ton patisserie préféré ici.</span></h6>
                </div> </div></div>
                <div class="row d-flex justify-content-evenly">
    <figure class="col-md-3" style="--i:rgba(54, 142, 249, 0.78)">
    <img src="https://www.oliveri.ma/images/nos-tartes/M/tarte3.jpg" alt="tarte">
    <figcaption>tarte</figcaption>
</figure>
<figure class="col-md-3" style="--i:rgba(54, 142, 249, 0.78)">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRyTikwdKOrEZyisKk2BEoBwFzlAZkljqzQxg&s" alt="petits pains">
    <figcaption>petits pains</figcaption>
</figure>

<figure class="col-md-3" style="--i:rgba(54, 142, 249, 0.78)">
    <img src="https://sallysbakingaddiction.com/wp-content/uploads/2024/01/mille-feuille-napoleon-pastry.jpg" alt="mille-feuilles">
    <figcaption>mille-feuilles</figcaption></figure>
</div>
@endsection