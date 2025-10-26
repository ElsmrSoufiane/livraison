@auth
<div class="feedback-container" style="margin: 3rem 0;">
    <!-- Toggle Button -->
    <div class="text-center">
        <button id="feedbackToggleBtn" 
                class="feedback-toggle-btn"
                onclick="toggleFeedbackForms()">
            ⊕ Laisser un avis
        </button>
        <br><br>
        <a href="/comm/{{$produit->id}}" class="product-info-btn">
            Voir les informations du produit
        </a>
    </div>

    <!-- Forms Container (hidden by default) -->
    <div id="feedbackForms" class="feedback-forms-container">
        <!-- Star Rating Form -->
        <form method="POST" action="{{route('star_rating',$produit->id)}}" class="rating-form">
            @csrf
            <input type="hidden" name="produit_id" value="{{ $produit->id }}">
            <div class="form-group">
                <label for="note">Donnez une note :</label>
                <div class="rating-controls">
                    <select name="note" id="note" class="rating-select">
                        @for($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}">{{ str_repeat('★', $i) }}{{ $i < 5 ? str_repeat('☆', 5 - $i) : '' }}</option>
                        @endfor
                    </select>
                    <button type="submit" class="submit-btn">
                        Noter
                    </button>
                </div>
            </div>
        </form>

        <!-- Comment Form -->
        <form method="POST" action='{{ route("commentaire.store",$produit->id) }}' class="comment-form">
            @csrf
            <input type="hidden" name="produit_id" value="{{ $produit->id }}">
            <div class="form-group">
                <label>Laissez un commentaire :</label>
                <textarea name="commentaire" rows="3" placeholder="Votre commentaire..." required
                    class="comment-textarea"></textarea>
                <button type="submit" class="submit-btn">
                    Publier
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    /* Feedback Component Styles */
    .feedback-toggle-btn {
        background-color: var(--primary-color);
        color: white;
        border: none;
        padding: 12px 24px;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(252, 127, 9, 0.2);
    }
    
    .feedback-toggle-btn:hover {
        background-color: #e67300;
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(252, 127, 9, 0.3);
    }
    
    .product-info-btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: var(--primary-color);
        color: white;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .product-info-btn:hover {
        background-color: #e67300;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(252, 127, 9, 0.2);
    }
    
    .feedback-forms-container {
        display: none;
        max-width: 600px;
        margin: 1.5rem auto 0;
        padding: 2rem;
        border-radius: 12px;
        background-color: white;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    }
    
    .rating-form {
        margin-bottom: 2rem;
        padding-bottom: 2rem;
        border-bottom: 1px dashed var(--border-color);
    }
    
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    .form-group label {
        display: block;
        margin-bottom: 0.75rem;
        font-weight: 600;
        color: var(--dark-color);
    }
    
    .rating-controls {
        display: flex;
        align-items: center;
        gap: 1rem;
    }
    
    .rating-select {
        width: 120px;
        padding: 0.75rem;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        background-color: white;
        color: var(--dark-color);
        font-weight: 500;
    }
    
    .comment-textarea {
        width: 100%;
        padding: 1rem;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        margin-bottom: 1rem;
        min-height: 120px;
        resize: vertical;
        transition: all 0.3s ease;
    }
    
    .comment-textarea:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(252, 127, 9, 0.2);
    }
    
    .submit-btn {
        padding: 0.75rem 1.5rem;
        background-color: var(--primary-color);
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .submit-btn:hover {
        background-color: #e67300;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(252, 127, 9, 0.2);
    }
    
    @media (max-width: 768px) {
        .feedback-forms-container {
            padding: 1.5rem;
        }
        
        .rating-controls {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }
        
        .rating-select {
            width: 100%;
        }
    }
</style>

<script>
    function toggleFeedbackForms() {
        const forms = document.getElementById('feedbackForms');
        const btn = document.getElementById('feedbackToggleBtn');
        
        if (forms.style.display === 'none') {
            forms.style.display = 'block';
            btn.innerHTML = '⊖ Masquer le formulaire';
            btn.style.backgroundColor = '#e67300';
        } else {
            forms.style.display = 'none';
            btn.innerHTML = '⊕ Laisser un avis';
            btn.style.backgroundColor = 'var(--primary-color)';
        }
    }
</script>
@endauth