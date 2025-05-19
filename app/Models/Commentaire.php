<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;
      protected $fillable = [
        'produit_id',
        'compte_id',
        'commentaire',
        'compte_id',
       
    ];
}
