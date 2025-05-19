<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Star_rating extends Model
{
    use HasFactory;
    protected $fillable = ['produit_id', 'compte_id', 'note'];

}
