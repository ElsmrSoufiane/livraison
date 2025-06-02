<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use App\Models\Categorie;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PointDeVenteController extends Controller
{
    // Afficher la liste des fournisseurs
    public function index()
    {
        $pointdeventes = Fournisseur::all();
        $categories = Categorie::all();
        return view('pointDeVente.index', compact('pointdeventes','categories'));
    }

    // Ajouter un fournisseur
    public function store(Request $request)
    {
        // 🔒 Validation des champs
        $validated = $request->validate([
            'Nom' => 'required|string|max:255',
            'Localisation' => 'required|string|max:255',
            'Description' => 'nullable|string',
            'Catégorie' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // 📷 Gestion de l’image si présente
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->image->store('fournisseurs', 'public');
        }

        // 🔍 On récupère l'ID de l'admin et de la catégorie
        $adminId = 1; // ou une autre logique pour récupérer l'admin
        $categorieId = $validated['Catégorie'];

        // 💾 Création du fournisseur
        Fournisseur::create([
            'nom' => $validated['Nom'],
            'localisation' => $validated['Localisation'],
            'description' => $validated['Description'] ?? null,
            'image' => $imagePath,
            'id_admin' => $adminId,   // Associer le fournisseur à l'admin
            'id_categorie' => $categorieId, // Associer le fournisseur à une catégorie
        ]);

        // 🔁 Redirection avec message
        return redirect()->route('pointdeventes.index')->with('success', 'Fournisseur ajouté avec succès.');
    }
    public function edit($id)
    {
        $pointdevente = Fournisseur::find($id);
        $categories = Categorie::all();
        return view('pointDeVente.edit', compact('pointdevente','categories'));
    }
    public function update($id,Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'localisation' => 'required|string|max:255',
            'description' => 'nullable|string',
            'categorie_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $pointdevente = Fournisseur::find($id);
        $imagePath = $pointdevente->image; 
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($pointdevente->image) {
                Storage::disk('public')->delete($pointdevente->image);
            }
            $imagePath = $request->file('image')->store('fournisseurs', 'public');
            $adminId = 1; // ou une autre logique pour récupérer l'admin
            
            Fournisseur::where('id', $id)->update([
                'nom' => $validated['nom'],
                'localisation' => $validated['localisation'],
                'description' => $validated['description'] ?? null,
                'image' => $imagePath,
                'id_admin' => $adminId,   // Associer le fournisseur à l'admin
                'id_categorie' => $validated['categorie_id'], // Associer le fournisseur à une catégorie
            ]);
              
            
            return redirect()->route('pointdeventes.index')->with('success', 'Fournisseur mis à jour avec succès.');
        } 
           

        

        

     }
     public function delete($id){
        $Fournisseur = Fournisseur::find($id);
        if ($Fournisseur) {
            $Fournisseur->delete();
            return redirect()->route('pointdeventes.index')->with('success', 'Fournisseur supprimé avec succès.');
    } }
}
