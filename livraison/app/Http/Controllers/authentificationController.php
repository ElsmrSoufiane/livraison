<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Compte;
use App\Models\Panier;
use Illuminate\Support\Facades\Hash;

class AuthentificationController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'mot_de_passe' => 'required|string'
        ]);

        $compte = Compte::where('email', $request->email)->first();

        if ($compte && Hash::check($request->mot_de_passe, $compte->mot_de_passe)) {
            Auth::login($compte);
            $request->session()->regenerate();
            return redirect('/')->with('success', 'Vous êtes connecté avec succès.');
        }

        return back()->withErrors([
            'email' => 'Les identifiants fournis ne correspondent pas à nos enregistrements.',
        ])->onlyInput('email');
    }

    public function registrer(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:comptes',
            'mot_de_passe' => 'required|string|min:8|confirmed',
            'numero' => 'required|string|max:15',
        ]);

        $compte = Compte::create([
            'nom' => $request->nom,
            'address' => $request->address,
            'email' => $request->email,
            'numero' => $request->numero,
            'mot_de_passe' => Hash::make($request->mot_de_passe),
            'role' => 'compte',
        ]);

        Auth::login($compte);
Panier::create([
            'id_client' => $compte->id,
        ]);

        return redirect('/')->with('success', 'Inscription réussie. Vous êtes maintenant connecté.');
    }
}