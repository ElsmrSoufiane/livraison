<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande_personalise extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_panier',
        'description',
        'address',
        'numero',
        'image',
        'etat',
        
    ];
}
