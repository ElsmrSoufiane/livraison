@extends("master")
@section("title")
les meilleurs restaurants et patisseries de fes
@endsection

@section("content")
<center>
  <select id="categoryFilter" class="form-select form-select-lg mb-3" style="width:40%" aria-label=".form-select-lg example">
      <option value="all">Tous</option>
      <option value="restaurant">restaurants</option>
      <option value="patisserie">patisserie</option>
  </select>
</center>
<br>
<div class="properties section" style="margin:0;padding:0;">
  <div class="container">
    <div class="row">
@foreach ($fournisseurs as $fournisseur)
@if ($fournisseur->id_categorie == 1)
      <!-- Restaurant -->
      <div class="col-lg-4 col-md-6 item-box  restaurant">
        <div class="item">
          <a href="property-details.html">
            <img src="{{ asset('storage/' . $fournisseur->image) }}" alt="">
          </a>
          <span class="category">restaurant</span>
          <h6><a><i class="fa fa-thumbs-up" aria-hidden="true"></i> 16</a></h6>
          <h4><a href="property-details.html">{{$fournisseur->nom}}</a></h4>
          <div class="main-button">
            <a href="/place">visiter</a>
          </div>
        </div>
      </div>@endif
      @endforeach

@foreach($fournisseurs as $fournisseur)
@if ($fournisseur->id_categorie == 2)
      <!-- Patisserie -->
      <div class="col-lg-4 col-md-6 item-box patisserie">
        <div class="item">
          <a href="property-details.html">
          <img src="{{ asset('storage/' . $fournisseur->image) }}" alt="">

          </a>
          <span class="category">patisserie</span>
          <h6><a><i class="fa fa-thumbs-up" aria-hidden="true"></i> 65</a></h6>
          <h4><a href="property-details.html">{{$fournisseur->nom}}</a></h4>
          <div class="main-button">
            <a href="/commandes">visiter</a>
          </div>
        </div>
      </div>

    </div>
  </div>
  @endif
  @endforeach
</div>

<!-- JavaScript Filter by Class -->
<script>
  document.getElementById('categoryFilter').addEventListener('change', function () {
    const selected = this.value;
    const allItems = document.querySelectorAll('.item-box');

    allItems.forEach(item => {
      if (selected === 'all') {
        item.style.display = 'block';
      } else if (item.classList.contains(selected)) {
        item.style.display = 'block';
      } else {
        item.style.display = 'none';
      }
    });
  });
</script>
@endsection
