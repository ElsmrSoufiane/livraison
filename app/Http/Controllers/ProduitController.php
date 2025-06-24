<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Fournisseur;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::with("categorie")->get();
      
        return view('produit.index', compact('produits'));
    }
    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'Nom_du_produit' => 'required|string|max:255',
            'Prix' => 'required|numeric|min:0',
            
            'Catégorie' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
        ]);
    
        // Sauvegarde de l'image si présente
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('produits', 'public');
        }
    
        // Création du produit
        $produit = new Produit();
        $produit->nom = $validated['Nom_du_produit'];
        $produit->prix = $validated['Prix'];
      
        $produit->categorie_id = $validated['Catégorie'];
        $produit->image = $imagePath ?? '';
        $produit->save();
    
        return redirect()->route('produits.index')->with('success', 'Produit ajouté avec succès.');
    }
    public function edit($id)
    {
        $produit = Produit::with('categorie')->findOrFail($id);
   $categories = Categorie::all();
        return view('produit.edit', compact('produit', 'categories'));
    }
    public function update($id,Request $request)
    {
      $validated = $request->validate([
            'nom_de_produit' => 'required|string|max:255',
            'prix' => 'required|numeric|min:0',
        
            'categorie' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
        ]);
       
        if($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('produits', 'public');
        } else {
            $imagePath = Produit::find($id)->image;
        }
           

        Produit::where('id', $id)->update([
            'nom' => $validated['nom_de_produit'],
            'prix' => $validated['prix'],
           
            'categorie_id' => $validated['categorie'],
            'image' => $imagePath,
        ]);

        
           return redirect()->route('produits.index')->with('success', 'Produit mis à jour avec succès.');
     }
     public function delete($id){
       
    $produit= Produit::find($id);
    if($produit){
        // Supprimer l'image du produit
        if ($produit->image) {
            Storage::disk('public')->delete($produit->image);
        }
        // Supprimer le produit de la base de données
        $produit->delete();
    }
    return redirect()->route('produits.index')->with('success', 'Produit supprimé avec succès.');
     }

    
}