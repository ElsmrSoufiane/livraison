@extends("master")
@section("title")
Les meilleurs restaurants et pâtisseries de Fès
@endsection

@section("content")
<style>
    :root {
        --primary-color: #FF6B35; /* Orange vif */
        --secondary-color: #2D3047; /* Bleu nuit */
        --accent-color: #FFD972; /* Jaune pâle */
        --text-dark: #2D3047;
        --text-light: #F5F5F5;
    }

    .gradient-bg {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
    }

    .card {
        border: none;
        border-radius: 15px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        overflow: hidden;
        position: relative;
    }

    .card::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, 
            transparent 25%,
            rgba(255,255,255,0.1) 50%,
            transparent 75%);
        transform: rotate(45deg);
        animation: shine 3s infinite;
    }

    @keyframes shine {
        0% { left: -50%; }
        100% { left: 150%; }
    }

    .card:hover {
        transform: translateY(-8px) rotate(1deg);
        box-shadow: 0 15px 30px rgba(0,0,0,0.15);
    }

    .category-badge {
        background: var(--secondary-color);
        color: var(--text-light);
        font-size: 0.9rem;
        padding: 8px 15px;
        border-radius: 20px;
        position: absolute;
        top: 15px;
        left: 15px;
        z-index: 2;
    }

    .btn-primary {
        background: var(--primary-color);
        border: none;
        padding: 10px 25px;
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background: var(--secondary-color);
        transform: scale(1.05);
    }

    .filter-select {
        border: 2px solid var(--primary-color);
        border-radius: 50px;
        padding: 15px 30px;
        font-size: 1.1rem;
        color: var(--text-dark);
        transition: all 0.3s ease;
    }

    .filter-select:focus {
        box-shadow: 0 0 0 3px rgba(255,107,53,0.3);
        border-color: var(--secondary-color);
    }

    .like-count {
        color: var(--primary-color);
        font-weight: 600;
    }
</style>

<div class="container py-5">
    <div class="text-center mb-5">
        <select id="categoryFilter" class="filter-select">
            <option value="all">Tous les établissements 🏡</option>
            <option value="restaurant">Restaurants 🍴</option>
            <option value="patisserie">Pâtisseries 🍰</option>
        </select>
    </div>

    <div class="row g-4">
        @foreach ($fournisseurs as $fournisseur)
            @if($fournisseur->id_categorie == 1 || $fournisseur->id_categorie == 2)
                <div class="col-lg-4 col-md-6 item-box {{ $fournisseur->id_categorie == 1 ? 'restaurant' : 'patisserie' }}">
                    <div class="card h-100">
                        <div class="position-relative">
                            <span class="category-badge">
                                {{ $fournisseur->id_categorie == 1 ? '🍴 Restaurant' : '🎂 Pâtisserie' }}
                            </span>
                            <img src="{{ asset('storage/' . $fournisseur->image) }}" 
                                 class="card-img-top" 
                                 alt="{{$fournisseur->nom}}"
                                 style="height: 250px; object-fit: cover;">
                        </div>
                        
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="card-title mb-0" style="color: var(--secondary-color);">
                                    {{$fournisseur->nom}}
                                </h4>
                                @if($fournisseur->isLiked)
                                <div class="like-count">
                                <a @auth() href='/unlike/{{auth()->user()->id}}/{{$fournisseur->id}}' @endauth>  <i class="fas fa-heart"></i> {{$fournisseur->likeCount }}</a>
                                </div>
                                @else
                             <a @auth() href='/like/{{auth()->user()->id}}/{{$fournisseur->id}}' @endauth>  <i class="fas fa-heart"></i> {{$fournisseur->likeCount }}</a>
                                @endif
                                
                               
                            </div>
                            <a href="/place/{{$fournisseur->id}}" class="btn btn-primary w-100">
                                Découvrir ➔
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>

<script>
document.getElementById('categoryFilter').addEventListener('change', function() {
    const category = this.value;
    const items = document.querySelectorAll('.item-box');
    
    items.forEach(item => {
        item.style.display = (category === 'all' || item.classList.contains(category)) 
            ? 'block' 
            : 'none';
    });
});
</script>
@endsection