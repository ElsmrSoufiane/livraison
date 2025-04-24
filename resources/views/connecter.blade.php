@extends("master")
@section("title")
les meilleurs restaurants et patisseries de fes
@endsection

@section("content")
<div class="section-heading text-center">
    <h6 style="font-size:30px">| se connecter</h6>
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

        <form id="contact-form" action="{{ route('login.store') }}" method="post">
            <div class="row">
                @csrf

                <div class="col-lg-12">
                    <fieldset>
                        <label for="email">email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                    </fieldset>
                </div>

                <div class="col-lg-12">
                    <fieldset>
                        <label for="mot_de_passe">mot de passe</label>
                        <input type="password" name="mot_de_passe" id="mot_de_passe" autocomplete="on" required>
                    </fieldset>
                </div>

                <div class="col-lg-12">
                    <fieldset>
                        <center>
                            <button type="submit" id="form-submit" class="orange-button">se connecter</button>
                        </center>
                        <br>
                        <a href="/inscrire" class="{{ Request::is('inscrire') ? 'active' : '' }}">s'inscrire</a> 
                    </fieldset>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection