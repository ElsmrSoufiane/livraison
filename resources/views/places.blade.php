@extends("master")
@section("title")
les meilleurs restaurants et patisseries de fes
@endsection

@section("content")
<center>
  <select id="categoryFilter" class="form-select form-select-lg mb-3" style="width:40%" aria-label=".form-select-lg example">
      <option value="all">Tous</option>
      <option value="restaurant">Restaurants</option>
      <option value="patisserie">Patisseries</option>
  </select>
</center>
<br>
<div class="properties section" style="margin:0;padding:0;">
  <div class="container">
    <div class="row">

      <!-- Restaurant -->
      <div class="col-lg-4 col-md-6 item-box restaurant">
        <div class="item">
          <a href="property-details.html">
            <img src="https://www.eat.ma/wp-content/uploads/mister-tacos-fes-menu.jpg" alt="">
          </a>
          <span class="category">restaurant</span>
          <h6><a><i class="fa fa-thumbs-up" aria-hidden="true"></i> 16</a></h6>
          <h4><a href="property-details.html">mr tacos chari3 wed fes</a></h4>
          <div class="main-button">
            <a href="property-details.html">visiter</a>
          </div>
        </div>
      </div>

      <!-- Patisserie -->
      <div class="col-lg-4 col-md-6 item-box patisserie">
        <div class="item">
          <a href="property-details.html">
            <img src="https://www.alentour.net/img/schede_anteprima/20.jpg" alt="">
          </a>
          <span class="category">patisserie</span>
          <h6><a><i class="fa fa-thumbs-up" aria-hidden="true"></i> 65</a></h6>
          <h4><a href="property-details.html">patisserie migador tari9 3ayn ch9af</a></h4>
          <div class="main-button">
            <a href="property-details.html">visiter</a>
          </div>
        </div>
      </div>

    </div>
  </div>
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
