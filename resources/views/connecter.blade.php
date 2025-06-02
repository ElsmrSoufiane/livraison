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
        <div class="row align-items-center"> <!-- Ajout de align-items-center pour centrer verticalement -->
            <!-- Colonne formulaire (identique) -->
            <div class="col-lg-6">
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
                </form>
            </div>
            
            <!-- Nouvelle colonne image -->
            <div class="col-lg-6 d-none d-lg-block text-center"> <!-- Visible seulement sur grands écrans -->
                <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" 
                     alt="Ambiance restaurant" 
                     class="img-fluid rounded shadow" 
                     style="max-height: 400px;">
            </div>
        </div>
    </div>
</div>

<!-- Le style existant est conservé, seules les modifications nécessaires sont ajoutées -->
<style>
    .contact-content {
        padding: 50px 0;
    }
    .orange-button {
        background-color: #ff8c00;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .orange-button:hover {
        background-color: #e67e00;
    }
    fieldset {
        border: none;
        margin-bottom: 20px;
    }
    input[type="email"], 
    input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-top: 5px;
    }
    label {
        font-weight: bold;
    }
    a {
        color: #ff8c00;
        text-decoration: none;
    }
    a:hover {
        text-decoration: underline;
    }
    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 5px;
    }
    .alert-success {
        background-color: #dff0d8;
        color: #3c763d;
    }
    .alert-danger {
        background-color: #f2dede;
        color: #a94442;
    }
</style>
@endsection