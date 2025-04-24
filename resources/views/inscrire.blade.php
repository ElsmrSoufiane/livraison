@extends("master")
@section("title")
les meilleurs restaurants et patisseries de fes
@endsection

@section("content")
<div class="section-heading text-center">
    <h6 style="font-size:30px">| s'inscrire</h6>
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

        <form id="contact-form" action="{{ route('registrer.store') }}" method="post">
            <div class="row"> 
                @csrf

                <div class="col-lg-12">
                    <fieldset>
                        <label for="name">nom complet</label>
                        <input type="text" name="nom" id="name" placeholder="nom complet" value="{{ old('nom') }}" autocomplete="on" required>
                    </fieldset>
                </div>

                <div class="col-lg-12">
                    <fieldset>
                        <label for="numero">numero</label>
                        <input type="number" name="numero" id="numero" placeholder="0666666666" value="{{ old('numero') }}" required>
                    </fieldset>
                </div>

                <div class="col-lg-12">
                    <fieldset>
                        <label for="numero">Email</label>
                        <input type="email" name="email" id="email" placeholder="Email@gmail.com" value="{{ old('email') }}" required>
                    </fieldset>
                </div>

                <div class="col-lg-12">
                    <fieldset>
                        <label for="address">adresse</label>
                        <input type="text" name="address" id="address" value="{{ old('address') }}" autocomplete="on">
                    </fieldset>
                </div>

                <div class="col-lg-12">
                    <fieldset>
                        <label for="mot_de_passe">creer un mot de passe</label>
                        <input type="password" name="mot_de_passe" id="mot_de_passe" autocomplete="on">
                    </fieldset>
                </div>

                <div class="col-lg-12">
                    <fieldset>
                        <label for="mot_de_passe_confirmation">repeter le mot de passe</label>
                        <input type="password" name="mot_de_passe_confirmation" id="mot_de_passe_confirmation" autocomplete="on">
                    </fieldset>
                </div>

                <div class="col-lg-12">
                    <fieldset>
                        <center><button type="submit" id="form-submit" class="orange-button">s'inscrire</button></center> 
                    </fieldset>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
