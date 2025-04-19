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
            <h6 style="font-size:30px">| mr tacos</h6>
          
          </div>
          <div class="row" >
          <div class="col-3" > 
          <ul class="list-group ">
  <li class="list-group-item"><a href="#">megador</a></li>
  <li class="list-group-item"><a href="#">pizza amrani</a></li>
  
</ul>
        </div>
          <div class="col-9" > 
          <div class="properties section" style="margin:0;padding:0;">
                <div class="container"> <!-- Open container -->

<div class="row"> <!-- Open row -->

  <div class="col-lg-4 col-md-6"> <!-- Open column -->
  
    <div class="item"> <!-- Open item -->

      <a href="property-details.html">
        <img src="https://t3.ftcdn.net/jpg/01/75/23/70/360_F_175237098_WYLhof7P2cH94S4EQDzdofpvdWe4pziB.jpg" alt="">
      </a>

    

      <h6>20dhs</h6>

      <h4>
        <a href="property-details.html">tacos poulet moyenne</a>
      </h4>

      <div class="main-button">
        <a href="property-details.html"><i class="fa fa-shopping-cart"></i></a>
      </div> <!-- Close main-button -->

    </div> <!-- Close item -->

  </div> <!-- Close column -->

</div> <!-- Close row -->

</div> <!-- Close container -->
</div> <!-- Close properties section -->

        </div>
          </div>

@endsection
