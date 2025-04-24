<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // ✅ le bon parent

class Compte extends Authenticatable // ✅ utiliser Authenticatable pour Auth
{
    use HasFactory;

    protected $table = 'comptes';

    protected $fillable = [
        'nom',
        'address',
        'email',
        'mot_de_passe',
        'numero',
        'role',
    ];

    protected $hidden = [
        'mot_de_passe',
        'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }
}
