@auth
<div style="margin: 20px 0;">
    <!-- Toggle Button -->
 <center>   <button id="feedbackToggleBtn" 
            style="background-color: #ff8c00; color: white; border: none; padding: 10px 20px; 
                   border-radius: 5px; cursor: pointer; font-weight: bold;"
            onclick="toggleFeedbackForms()">
        ⊕ Laisser un avis
    </button>  <br> <br>
    <a href="/comm/{{$produit->id}}" style="padding: 8px 15px; background-color: #ff8c00; color: white; 
                        border: none; border-radius: 4px; cursor: pointer;">
                        voir les informations
    </a>
</center>

    <!-- Forms Container (hidden by default) -->
    <div id="feedbackForms" style="display: none; max-width: 500px; margin-top: 15px; 
                border: 1px solid #ffd8b2; padding: 20px; border-radius: 8px; background-color: #fff8f0;">
        
        <!-- Star Rating Form -->
        <form method="POST" action="{{route('star_rating',$produit->id)}}" style="margin-bottom: 20px; padding-bottom: 20px; border-bottom: 1px dashed #ffd8b2;">
            @csrf
            <input type="hidden" name="produit_id" value="{{ $produit->id }}">
            <div style="margin-bottom: 15px;">
                <label for="note" style="display: block; margin-bottom: 8px; font-weight: 600; color: #e67300;">Donnez une note :</label>
                <div style="display: flex; align-items: center; gap: 10px;">
                    <select name="note" id="note" style="width: 100px; padding: 8px; border: 1px solid #ffb366; 
                            border-radius: 4px; background-color: white; color: #e67300;">
                        @for($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}">{{ str_repeat('★', $i) }}{{ $i < 5 ? str_repeat('☆', 5 - $i) : '' }}</option>
                        @endfor
                    </select>
                    <button type="submit" style="padding: 8px 15px; background-color: #ff8c00; color: white; 
                            border: none; border-radius: 4px; cursor: pointer;">
                        Noter
                    </button>
                </div>
            </div>
        </form>

        <!-- Comment Form -->
        <form method="POST"  action='{{ route("commentaire.store",$produit->id) }}'>
            @csrf
            <input type="hidden" name="produit_id" value="{{ $produit->id }}">
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #e67300;">Laissez un commentaire :</label>
                <textarea name="commentaire" rows="3" placeholder="Votre commentaire..." required
                    style="width: 100%; padding: 10px; border: 1px solid #ffb366; border-radius: 4px; 
                           margin-bottom: 10px; min-height: 80px;"></textarea>
                <button type="submit" style="padding: 8px 15px; background-color: #ff8c00; color: white; 
                        border: none; border-radius: 4px; cursor: pointer;">
                    Publier
                </button>
            </div>
        </form>
        <br>
      <center>  <a href="/comm/{{$produit->id}}" style="padding: 8px 15px; background-color: #ff8c00; color: white; 
                        border: none; border-radius: 4px; cursor: pointer;">
                        voir tout les commentaires
    </a>
</center>
    </div>
</div>

<script>
    function toggleFeedbackForms() {
        const forms = document.getElementById('feedbackForms');
        const btn = document.getElementById('feedbackToggleBtn');
        
        if (forms.style.display === 'none') {
            forms.style.display = 'block';
            btn.innerHTML = '⊖ Masquer';
            btn.style.backgroundColor = '#e67300';
        } else {
            forms.style.display = 'none';
            btn.innerHTML = '⊕ Laisser un avis';
            btn.style.backgroundColor = '#ff8c00';
        }
    }
</script>

<style>
    #feedbackToggleBtn:hover {
        background-color: #e67300 !important;
    }
    
    button[type="submit"]:hover {
        background-color: #e67300;
    }
    
    textarea:focus, select:focus {
        outline: none;
        border-color: #ff8c00 !important;
        box-shadow: 0 0 0 2px rgba(255,140,0,0.2);
    }
</style>
@endauth