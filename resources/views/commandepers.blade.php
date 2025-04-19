@extends("master")
@section("title")
les meilleurs restaurants et patisseries de fes
@endsection

@section("content")
<div class="section-heading text-center">
    <h6 style="font-size:30px">| faire une commande personnalisée</h6>
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

        <form id="contact-form" action="/commandes_personalise" method="post" enctype="multipart/form-data">
            <div class="row">
                @csrf

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
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" required>
                    </fieldset>
                </div>

                <div class="col-lg-12">
                    <fieldset>
                        <label for="description">Description du produit</label>
                        <textarea name="description" id="description">{{ old('description') }}</textarea>
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
@endsection
