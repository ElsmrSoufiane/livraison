<?php

namespace App\Models;
use App\Models\Compte;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Star_rating extends Model
{
    use HasFactory;
    protected $fillable = ['produit_id', 'compte_id', 'note'];
public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id');
    }

    public function compte()
    {
        return $this->belongsTo(Compte::class, 'compte_id');
    }
}
