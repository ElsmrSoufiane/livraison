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
        $produits = Produit::all();
        $fournisseurs = Fournisseur::all();
        $categories = Categorie::all();
        return view('produit.index', compact('produits','fournisseurs','categories'));
    }
    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'Nom_du_produit' => 'required|string|max:255',
            'Prix' => 'required|numeric|min:0',
            'Fournisseur' => 'required|exists:fournisseurs,id',
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
        $produit->fournisseur_id = $validated['Fournisseur'];
        $produit->categorie_id = $validated['Catégorie'];
        $produit->image = $imagePath ?? '';
        $produit->save();
    
        return redirect()->route('produits.index')->with('success', 'Produit ajouté avec succès.');
    }
    public function edit($id)
    {
        $produit = Produit::find($id);
        $categories = Categorie::all();
        $fournisseurs = Fournisseur::all();
        return view('produit.edit', compact('produit','categories','fournisseurs'));
    }
    public function update($id,Request $request)
    {
      $validated = $request->validate([
            'nom_de_produit' => 'required|string|max:255',
            'prix' => 'required|numeric|min:0',
            'fournisseur' => 'required|exists:fournisseurs,id',
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
            'fournisseur_id' => $validated['fournisseur'],
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