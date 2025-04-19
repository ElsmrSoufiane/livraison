@extends("master")

@section("title")
Les meilleurs restaurants et pâtisseries de Fès
@endsection

@section("content")
<div class="section-heading text-center">
    <h6 style="font-size:30px">| Pizza viande taille XL</h6>
</div>

<div class="contact-content">
    <div class="container">

        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Error Messages --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul style="margin-bottom: 0;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="contact-form" action="/commandes" method="post">
            @csrf
            <div class="row">

                <div class="col-lg-12">
                    <fieldset>
                        <label for="quantite">Quantité</label>
                        <input type="number" name="quantite" id="quantite" value="{{ old('quantite', 1) }}" min="1" class="form-control">
                    </fieldset>
                </div>

                <div class="col-lg-12">
                    <fieldset>
                        <label for="total">Total (DH)</label>
                        <input type="number" value="{{ old('prix_total', 20) }}" name="prix_total" id="total" readonly class="form-control">
                    </fieldset>
                </div>

                <div class="col-lg-12">
                    <fieldset>
                        <label for="numero">Numéro</label>
                        <input type="number" name="numero" id="numero" placeholder="0666666666" value="{{ old('numero') }}" required>
                    </fieldset>
                </div>

                <div class="col-lg-12">
                    <fieldset>
                        <label for="address">Adresse</label>
                        <input type="text" name="address" id="address" value="{{ old('address') }}" autocomplete="on">
                    </fieldset>
                </div>

                <div class="col-lg-12">
                    <fieldset>
                        <center>
                            <button type="submit" id="form-submit" class="orange-button">
                                <i class="fa fa-shopping-cart"></i> Commander
                            </button>
                        </center>
                        <br>
                    </fieldset>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    const prixUnitaire = 20;
    const quantiteInput = document.getElementById("quantite");
    const totalInput = document.getElementById("total");

    quantiteInput.addEventListener("input", () => {
        const quantite = parseInt(quantiteInput.value) || 1;
        totalInput.value = quantite * prixUnitaire;
    });
</script>
@endsection
