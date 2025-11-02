@extends("master")
@section("title")
Les meilleurs restaurants et pâtisseries de Fès
@endsection

@section("content")
<div class="section-heading text-center animate__animated animate__fadeInDown">
    <h6 class="section-title">| s'inscrire</h6>
</div>

<div class="contact-content">
    <div class="container">
        <div class="row align-items-stretch">
            <!-- Colonne formulaire -->
            <div class="col-lg-6 animate__animated animate__fadeInLeft">
                {{-- Success Message --}}
                @if(session('success'))
                    <div class="alert alert-success animate__animated animate__fadeIn">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Error Messages --}}
                @if($errors->any())
                    <div class="alert alert-danger animate__animated animate__shakeX">
                        <ul style="margin-bottom: 0;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form id="contact-form" action="{{ route('registrer.store') }}" method="post" class="form-card h-100">
                    <div class="d-flex flex-column h-100">
                        @csrf

                        <div class="form-group">
                            <label for="name">Nom complet</label>
                            <input type="text" name="nom" id="name" placeholder="Nom complet" value="{{ old('nom') }}" autocomplete="on" required class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="numero">Téléphone</label>
                            <input type="number" name="numero" id="numero" placeholder="0666666666" value="{{ old('numero') }}" required class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" placeholder="email@gmail.com" value="{{ old('email') }}" required class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="address">Adresse</label>
                            <input type="text" name="address" id="address" value="{{ old('address') }}" autocomplete="on" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="mot_de_passe">Mot de passe</label>
                            <input type="password" name="mot_de_passe" id="mot_de_passe" autocomplete="on" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="mot_de_passe_confirmation">Confirmer le mot de passe</label>
                            <input type="password" name="mot_de_passe_confirmation" id="mot_de_passe_confirmation" autocomplete="on" class="form-control">
                        </div>

                        <div class="mt-auto"> <!-- Pousse le bouton vers le bas -->
                            <button type="submit" id="form-submit" class="btn btn-primary btn-block btn-submit">
                                <span class="btn-text">S'inscrire</span>
                                <span class="btn-icon"><i class="fas fa-arrow-right"></i></span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            
            <!-- Colonne image avec espace équilibré -->
            <div class="col-lg-6 d-none d-lg-block animate__animated animate__fadeInRight">
                <div class="d-flex flex-column h-100">
                    <div class="img-container flex-grow-1 rounded shadow overflow-hidden">
                        <img src="https://i.ibb.co/twc251yv/Whats-App-Image-2025-10-27-at-12-07-23-1.jpg" 
                             alt="Nourriture marocaine" 
                             class="img-fluid h-100 w-100 object-fit-cover">
                        <div class="img-overlay"></div>
                    </div>
                    
                    <!-- Espace égale sous l'image -->
                    <div class="form-footer-space" style="height: 60px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Styles CSS -->
<style>
    :root {
        --primary-color: #ff6b00;
        --secondary-color: #ff8c00;
        --dark-color: #333;
        --light-color: #f8f9fa;
        --shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }
    
    body {
        background-color: #fafafa;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    .section-heading {
        margin-bottom: 3rem;
    }
    
    .section-title {
        font-size: 2rem;
        color: var(--dark-color);
        position: relative;
        display: inline-block;
        padding-bottom: 10px;
    }
    
    .section-title:after {
        content: '';
        position: absolute;
        width: 50%;
        height: 3px;
        background: var(--primary-color);
        bottom: 0;
        left: 25%;
    }
    
    .form-card {
        background: white;
        padding: 2.5rem;
        border-radius: 15px;
        box-shadow: var(--shadow);
        transition: transform 0.3s ease;
    }
    
    .form-card:hover {
        transform: translateY(-5px);
    }
    
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    .form-control {
        height: 45px;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        transition: all 0.3s;
    }
    
    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(255, 107, 0, 0.25);
    }
    
    label {
        font-weight: 600;
        color: #555;
        margin-bottom: 0.5rem;
    }
    
    .btn-primary {
        background-color: var(--primary-color);
        border: none;
        padding: 12px 25px;
        border-radius: 8px;
        font-weight: 600;
        letter-spacing: 0.5px;
        overflow: hidden;
        position: relative;
        transition: all 0.3s;
    }
    
    .btn-primary:hover {
        background-color: var(--secondary-color);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 107, 0, 0.3);
    }
    
    .btn-icon {
        margin-left: 10px;
        transition: all 0.3s;
    }
    
    .btn-submit:hover .btn-icon {
        transform: translateX(5px);
    }
    
    .img-container {
        position: relative;
        min-height: 300px;
    }
    
    .img-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, rgba(0,0,0,0.1), rgba(0,0,0,0.3));
    }
    
    .alert {
        border-radius: 8px;
        padding: 1rem;
        margin-bottom: 1.5rem;
    }
    
    .alert-success {
        background-color: #dff0d8;
        color: #3c763d;
        border-color: #d6e9c6;
    }
    
    .alert-danger {
        background-color: #f2dede;
        color: #a94442;
        border-color: #ebccd1;
    }
    
    .h-100 {
        height: 100%;
    }
    
    .object-fit-cover {
        object-fit: cover;
    }
    
    .form-footer-space {
        background: transparent;
    }
    
    .align-items-stretch {
        align-items: stretch !important;
    }
    
    /* Animations */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<!-- Bibliothèques externes -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<!-- Script d'animation -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animation séquentielle
        const elements = [
            '.animate__fadeInDown',
            '.animate__fadeInLeft', 
            '.animate__fadeInRight'
        ];
        
        elements.forEach((el, index) => {
            setTimeout(() => {
                const element = document.querySelector(el);
                if(element) element.style.opacity = 1;
            }, 200 * (index + 1));
        });
    });
</script>
@endsection
