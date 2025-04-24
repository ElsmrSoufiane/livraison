@extends("master")
@section("title")
    site livraison fes

@endsection
@section("content")

@auth()
<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-md-12 text-center">
            <h2>Bienvenue, {{ Auth::user()->name }}!</h2>
            <p>Vous êtes connecté en tant que {{ Auth::user()->role }}</p>
        </div>
    </div> @endauth
 <div class="section-heading text-center">
            <h6 style="font-size:30px">| Categories</h6>
          
          </div>
  <div class="row">
    <figure class="col-md-3" style="--i:rgba(255, 117, 89, 0.78)">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS9oBl8oMj8unCKsHx9WuzVKgxc34HJnei-Qw&s" alt="restaurant">
    <figcaption>restaurants</figcaption>
</figure>
<figure class="col-md-3" style="--i:rgba(89, 205, 255, 0.61)" >
    <img src="https://img.freepik.com/photos-gratuite/assortiment-patisserie-sucree-vue-dessus_23-2148516578.jpg" alt="patisserie">
    <figcaption>patisserie</figcaption></figure>

<figure class="col-md-3" style="--i:rgba(71, 243, 151, 0.78)">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ_4QQ8wgif1pKpIr29znenI84B4zlCjufw3Q&s" alt="pharmacie">
    <figcaption>pharmacie</figcaption></figure>
    
 

    <figure class="col-md-3" style="--i:rgba(255, 117, 89, 0.78)">
    <img src="https://media.istockphoto.com/id/589415708/fr/photo/fruits-et-l%C3%A9gumes-frais.jpg?s=612x612&w=0&k=20&c=vaL3a_OsX1fLl_INeYZsmYJJDxIsKTOh7tdAib9PLoo=" alt="pharmacie">
    <figcaption>legumes et fruits</figcaption></figure>
</div><br>
<div class="contact-content">
<div class="container">
<div class="item " style="margin:10px;width:50%">
                <img src="icons8-pharmacy-shop-64.png" alt="" style="max-width: 52px;">
                <h6>pharmacie <br><span> demander des medicaments</span></h6>
                </div> </div></div>

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