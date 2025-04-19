<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Compte;
class authentificationController extends Controller
{
    public function login(Request $request){
        Auth::attempt([
            'email' => $request->email,
            'mot_de_passe' => $request->mot_de_passe
        ]);
        if (Auth::check()) {
            return redirect('/')->with('success', 'Vous êtes connecté avec succès.');
        } else {
            return redirect('/connecter')->with('error', 'Identifiants invalides.');
        }
    }
    public function registrer(Request $request){
        $request->validate([
            'nom' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:comptes',
            'mot_de_passe' => 'required|string|min:8|confirmed',
            'numero'=> 'required|string|max:15',
        ]);
        
        Compte::create([
            'nom' => $request->nom,
            'address' => $request->address,
            'email' => $request->email,
            'numero' => $request->numero,
            'mot_de_passe' =>  Hash::make($request->mot_de_passe),
        ]);
        return redirect('/')->with('success', 'Inscription réussie.');

    }
}
