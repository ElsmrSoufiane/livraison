<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class livreur extends Model
{
    use HasFactory;
    protected $table = 'comptes';
    protected $fillable = [
        'nom',
        'email',
        'mot_de_passe',
        'address',
        'numero',
        
    ];
}