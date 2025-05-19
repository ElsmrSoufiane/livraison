@extends("master")
@section("title", "Product Reviews")

@section("content")
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container py-4">
    <!-- Product Card -->
    <div class="product-card mb-5">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('storage/'.$produit->image) }}" class="img-fluid rounded" alt="{{ $produit->nom }}">
            </div>
            <div class="col-md-8">
                <h2>{{ $produit->nom }}</h2>
                <p class="text-muted">{{ $produit->description }}</p>
                <h4 class="text-primary">{{ number_format($produit->prix, 2) }} dhs</h4>
                
                <!-- Average Rating -->
                <div class="rating-section mt-3">
                    <h5>Average Rating:</h5>
                    <div class="stars">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= $averageNote)
                                ★
                            @else
                                ☆
                            @endif
                        @endfor
                        <span class="ms-2">{{ number_format($averageNote, 1) }}/5 ({{ $commentaires->count() }} reviews)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Comments Section -->
    <div class="comments-section">
        <h3 class="mb-4">Customer Reviews</h3>
        
        @foreach($commentaires as $commentaire)
        <div class="card mb-3">
            <div class="card-body">
                <div >
                    <img  src="https://cdn-icons-png.flaticon.com/512/9187/9187604.png" style="width:40px"  alt="User">
                    <div>
                        @php
                            $user = $comptes->firstWhere('id', $commentaire->id_compte);
                        @endphp
                        <h5 class="mb-1">{{ $user->nom ?? 'Anonymous' }}</h5>
                        <small class="text-muted">{{ $commentaire->created_at->format('M d, Y') }}</small>
                        <p class="mt-2 mb-0">{{ $commentaire->commentaire }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        @if($commentaires->isEmpty())
            <div class="alert alert-info">No reviews yet. Be the first to review!</div>
        @endif
    </div>
</div>

<style>
    .product-card {
        background: white;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
    
    .stars {
        color: #ffc107;
        font-size: 1.5rem;
        letter-spacing: 2px;
    }
    
    .rating-section {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 8px;
    }
</style>
@endsection