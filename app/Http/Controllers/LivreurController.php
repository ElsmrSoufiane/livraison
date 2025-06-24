<?php

namespace App\Http\Controllers;

use App\Models\Livreur;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LivreurController extends Controller 
{
    public function index()
    {
        $livreurs = Livreur::all();
        return view('livreur.index', compact('livreurs')); 
    }

    public function store(Request $request)
    {
        // 🔒 Validation des champs
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:comptes,email',
            'mot_de_passe' => 'required|string|min:6',
            'address' => 'required|string|max:255',
            'numero' => 'required|string|max:15',
           
// Contrôler que le rôle soit valide
        ]);

        // 💾 Création du compte avec le mot de passe crypté
        Livreur::create([
            'nom' => $validated['nom'],
            'email' => $validated['email'],
             'role'=>"livreur",
            'mot_de_passe' => Hash::make($validated['mot_de_passe']), // Hash du mot de passe
            'address' => $validated['address'],
            'numero' => $validated['numero'],
           
            
        ]);

        // 🔁 Redirection avec message
        return redirect()->route('livreurs.index')->with('success', 'Compte créé avec succès.');
    }
    public function edit($id)
    {
        $livreur = Livreur::find($id);
        return view('livreur.edit', compact('livreur'));
    }
    public function update($id,Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:comptes,email,' . $id,
            'mot_de_passe' => 'nullable|string|min:6',
            'address' => 'required|string|max:255',
            'numero' => 'required|string|max:15',
        ]);
        $livreur = Livreur::find($id);
        Livreur::where('id', $id)->update([
            'nom' => $validated['nom'],
            'email' => $validated['email'],
            'address' => $validated['address'],
            'numero' => $validated['numero'],
        ]);
        return redirect()->route('livreurs.index')->with('success', 'Compte mis à jour avec succès.');

     }
    public function delete($id){
        $livreur = Livreur::find($id);
        if ($livreur) {
            $livreur->delete();
            return redirect()->route('livreurs.index')->with('success', 'Compte supprimé avec succès.');
        } else {
            return redirect()->route('livreurs.index')->with('error', 'Compte non trouvé.');
        }
    }
    
    

}