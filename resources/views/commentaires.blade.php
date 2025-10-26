@extends("master")
@section("title", "Product Reviews")

@section("content")
<style>
    :root {
        --primary: #f35525;
        --primary-dark:rgb(205, 52, 6);
        --secondary: #3f37c9;
        --accent: #f35525;
        --light: #f8f9fa;
        --dark: #212529;
        --gray: #6c757d;
        --light-gray: #e9ecef;
        --border-radius: 12px;
        --shadow: 0 4px 20px rgba(0,0,0,0.08);
        --transition: all 0.3s ease;
    }

    .product-review-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem 1rem;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    /* Product Card */
    .product-card {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
        background: white;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow);
        overflow: hidden;
        margin-bottom: 3rem;
    }

    .product-image-container {
        position: relative;
        height: 400px;
        overflow: hidden;
        border-radius: var(--border-radius) 0 0 var(--border-radius);
    }

    .product-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .product-image:hover {
        transform: scale(1.03);
    }

    .product-details {
        padding: 2rem 2rem 2rem 0;
        display: flex;
        flex-direction: column;
    }

    .product-title {
        font-size: 2rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 0.5rem;
    }

    .product-description {
        color: var(--gray);
        line-height: 1.6;
        margin-bottom: 1.5rem;
    }

    .product-price {
        font-size: 1.75rem;
        font-weight: 600;
        color: var(--accent);
        margin-bottom: 1.5rem;
    }

    .rating-container {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
    }

    .stars {
        color: #ffc107;
        font-size: 1.5rem;
        margin-right: 1rem;
        letter-spacing: 2px;
    }

    .rating-text {
        font-size: 1rem;
        color: var(--gray);
    }

    .info-link {
        display: inline-block;
        margin-top: 1rem;
        color: var(--primary);
        text-decoration: none;
        font-weight: 600;
        transition: var(--transition);
    }

    .info-link:hover {
        color: var(--primary-dark);
        text-decoration: underline;
    }

    .add-to-cart-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background-color: var(--primary);
        color: white;
        font-weight: 600;
        padding: 0.75rem 1.5rem;
        border-radius: 50px;
        text-decoration: none;
        margin-top: 1.25rem;
        font-size: 1rem;
        transition: var(--transition);
        border: none;
        cursor: pointer;
        width: fit-content;
    }

    .add-to-cart-btn:hover {
        background-color: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(67, 97, 238, 0.3);
    }

    /* Review Form */
    .toggle-btn {
        background: var(--primary);
        color: white;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 50px;
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 2rem;
    }

    .toggle-btn:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
    }

    .toggle-btn .icon {
        font-size: 1.2rem;
    }

    .hidden-form {
        display: none;
    }

    .review-form-container {
        background: white;
        border-radius: var(--border-radius);
        padding: 2rem;
        box-shadow: var(--shadow);
        margin-bottom: 3rem;
    }

    .review-form-title {
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
        color: var(--dark);
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: var(--dark);
    }

    .form-input {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid var(--light-gray);
        border-radius: var(--border-radius);
        font-family: inherit;
        transition: var(--transition);
    }

    .form-input:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
    }

    .form-textarea {
        min-height: 120px;
        resize: vertical;
    }

    .submit-btn {
        background: var(--primary);
        color: white;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 50px;
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
    }

    .submit-btn:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
    }

    .divider {
        height: 1px;
        background: var(--light-gray);
        margin: 2rem 0;
    }

    /* Reviews Section */
    .reviews-container {
        margin-top: 2rem;
    }

    .reviews-title {
        font-size: 1.75rem;
        margin-bottom: 1.5rem;
        color: var(--dark);
        position: relative;
        padding-bottom: 0.5rem;
    }

    .reviews-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 60px;
        height: 3px;
        background: var(--primary);
    }

    .no-reviews {
        text-align: center;
        padding: 2rem;
        background: white;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow);
        color: var(--gray);
    }

    .review-card {
        background: white;
        border-radius: var(--border-radius);
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        box-shadow: var(--shadow);
    }

    .review-header {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
    }

    .review-avatar {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        margin-right: 1rem;
        object-fit: cover;
    }

    .review-user {
        font-weight: 600;
        color: var(--dark);
    }

    .review-date {
        font-size: 0.875rem;
        color: var(--gray);
    }

    .review-content {
        color: var(--dark);
        line-height: 1.6;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .product-card {
            grid-template-columns: 1fr;
        }

        .product-image-container {
            border-radius: var(--border-radius) var(--border-radius) 0 0;
            height: 300px;
        }

        .product-details {
            padding: 1.5rem;
        }
    }
</style>

<div class="product-review-container">
    <!-- Product Information Section -->
    <div class="product-card">
        <div class="product-image-container">
            <img src="{{ $produit->image }}" class="product-image" alt="{{ $produit->nom }}">
        </div>
        <div class="product-details">
            <h1 class="product-title">{{ $produit->nom }}</h1>
            <p class="product-description">{{ $produit->description }}</p>
            <div class="product-price">{{ number_format($produit->prix, 2) }} dhs</div>
            
            <div class="rating-container">
                <div class="stars">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= $averageNote)
                            ★
                        @else
                            ☆
                        @endif
                    @endfor
                </div>
                <span class="rating-text">{{ number_format($averageNote, 1) }} out of 5 ({{ $commentaires->count() }} reviews)</span>
            </div>

            <a href="/comm/{{$produit->id}}" class="info-link">View product details & specifications</a>
            @auth()
<form method="POST" action="/commandes/{{$produit->id}}/{{$panier->id}}">
         @csrf       
            <input type="submit" value='🛒 ajouter au panier' class="add-to-cart-btn"/>
                
            
</form>@endauth
        </div>
    </div>

    @auth
    <!-- Review Form Section -->
    <div style="text-align: center;">
        <button id="feedbackToggleBtn" class="toggle-btn" onclick="toggleFeedbackForms()">
            <span class="icon">⊕</span>
            faire commentaire
        </button>
    </div>

    <div id="feedbackForms" class="hidden-form">
        <div class="review-form-container">
            <h2 class="review-form-title">vos exepriences:</h2>

            <form method="POST" action="{{route('star_rating',$produit->id)}}">
                @csrf
                <input type="hidden" name="produit_id" value="{{ $produit->id }}">
                <div class="form-group">
                    <label class="form-label">reviews:</label>
                    <select name="note" id="note" class="form-input">
                        @for($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}">{{ str_repeat('★', $i) }}{{ $i < 5 ? str_repeat('☆', 5 - $i) : '' }} ({{ $i }} star)</option>
                        @endfor
                    </select>
                </div>
                <button type="submit" class="submit-btn">Submit Rating</button>
            </form>

            <div class="divider"></div>

            <form method="POST" action="{{ route('commentaire.store',$produit->id) }}">
                @csrf
                <input type="hidden" name="produit_id" value="{{ $produit->id }}">
                <div class="form-group">
                    <label for="commentaire" class="form-label">Your Review</label>
                    <textarea name="commentaire" id="commentaire" class="form-input form-textarea" 
                        placeholder="Share your thoughts about this product..." required></textarea>
                </div>
                <button type="submit" class="submit-btn">Submit Review</button>
            </form>
        </div>
    </div>
    @endauth

    <!-- Reviews Section -->
    <div class="reviews-container">
        <h2 class="reviews-title">Customer Reviews</h2>
        @if($commentaires->isEmpty())
            <div class="no-reviews">
                <p>No reviews yet. Be the first to share your thoughts!</p>
            </div>
        @else
            @foreach($commentaires as $commentaire)
            <div class="review-card">
                <div class="review-header">
                    <img src="https://cdn-icons-png.flaticon.com/512/9187/9187604.png" class="review-avatar" alt="User avatar">
                    <div>
                        @php
                            $user = $comptes->firstWhere('id', $commentaire->compte_id);
                        @endphp
                        <div class="review-user">{{ $user->nom ?? 'Anonymous' }}</div>
                        <div class="review-date">{{ $commentaire->created_at->format('F j, Y') }}</div>
                    </div>
                </div>
                <div class="review-content">{{ $commentaire->commentaire }}</div>
            </div>
            @endforeach
        @endif
    </div>
</div>

@auth
<script>
    function toggleFeedbackForms() {
        const forms = document.getElementById('feedbackForms');
        const btn = document.getElementById('feedbackToggleBtn');
        if (forms.classList.contains('hidden-form')) {
            forms.classList.remove('hidden-form');
            btn.innerHTML = '<span class="icon">⊖</span> Hide Review Form';
        } else {
            forms.classList.add('hidden-form');
            btn.innerHTML = '<span class="icon">⊕</span> Leave a Review';
        }
    }
</script>
@endauth
@endsection