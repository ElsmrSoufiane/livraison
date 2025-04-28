@extends("master")
@section("title")
mr tacos
@endsection

@section("content")
<style>
   li a{
        color:black;
        transition-duration: 0.4s;
    }
    li a:hover{ color: #ee626b!important;
      opacity: 1;}
    
    </style>
<div class="section-heading text-center">
            <h6 style="font-size:30px">| {{$fournisseur->nom}} </h6>
            <h4 style="font-size:30px">| {{$fournisseur->localisation}} </h4>
          
          </div>
          <div class="row" >
          <div class="col-3" > 
          <ul class="list-group ">
            @foreach($fournisseurs as $f)
  <li class="list-group-item"><a href="/place/{{$f->id}}">{{$f->nom}}</a></li>

  @endforeach
</ul>
        </div>
          <div class="col-9" > 
          <div class="properties section" style="margin:0;padding:0;">
                <div class="container"> <!-- Open container -->

<div class="row"> <!-- Open row -->
@foreach($produits as $produit)
  <div class="col-lg-4 col-md-6"> <!-- Open column -->
  
    <div class="item"> <!-- Open item -->

      <a href="/commander/{{$produit->id}}">
        <img src="{{ asset('storage/' . $produit->image) }}" alt="">
       
      </a>

    

      <h6>{{$produit->prix}}dhs</h6>

      <h4>
        <a href="/commander/{{$produit->id}}">{{$produit->nom}}</a>
      </h4>

      <div class="main-button">
        <a href="/commander/{{$produit->id}}"><i class="fa fa-shopping-cart"></i></a>
      </div> <!-- Close main-button -->

    </div> <!-- Close item -->

  </div> <!-- Close column -->
@endforeach
</div> <!-- Close row -->

</div> <!-- Close container -->
</div> <!-- Close properties section -->

        </div>
          </div>

@endsection
