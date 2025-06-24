<?php
namespace App\Models;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model {
    use HasFactory;
public function categorie() {
        return $this->belongsTo(Categorie::class);
    }
    protected $fillable = ['image', 'Catégorie', 'Prix', 'Nom_du_produit'];
}