<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produit;
use App\Models\Panier;
use App\Models\Compte;
class Commande extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_produit',
        'id_panier',
        'quantite',
        'prix_total',
        'address',
        'numero',
        'etat',
    ];
    public function produit()
    {
        return $this->belongsTo(Produit::class, 'id_produit');
    }
    public function panier()
    {
        return $this->belongsTo(Panier::class, 'id_panier');
    }
    public function livreur()
    {
        return $this->belongsTo(Compte::class, 'id_livreur');
    }
}
