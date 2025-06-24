<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Commande;

class Panier extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_client',
    ];
    public function commandes()
    {
        return $this->hasMany(Commande::class, 'id_panier');
    }
    public function client()
    {
        return $this->belongsTo(Compte::class, 'id_client');
    }
}
