<?php

namespace App\Http\Controllers;
use App\Models\Commande;
use App\Models\Produit;
use App\Models\Commande_personalise;
use Illuminate\Http\Request;

class commandecontroller extends Controller
{
    public function addquantite($id_commande)
    {
            $commande = Commande::find($id_commande);
            
        $produit=Produit::find($commande->id_produit);
        $commande->quantite += 1;
        $commande->prix_total = $commande->quantite * $produit->prix;
        $commande->save();

        return redirect()->back()->with('success', 'Quantité mise à jour avec succès.');

    }
    public function moinquantite($id_commande)
    {
        $commande = Commande::find($id_commande);
            if($commande->quantite != 1) {

        $produit=Produit::find($commande->id_produit);
        $commande->quantite -= 1;
        $commande->prix_total = $commande->quantite * $produit->prix;
        $commande->save();

        return redirect()->back()->with('success', 'Quantité mise à jour avec succès.');
 }else{ 
    return redirect()->back()->with('error', 'La quantité ne peut pas être inférieure à 1.');
 }
     
 
    }
    public function store(Request $request,$id_produit,$id_panier)
    
    {
        $produit=Produit::find($id_produit);
     
    
Commande::create([
'id_produit'=>$id_produit,
'id_panier'=>$request->id_panier,
'quantite'=>1,
'prix_total'=>$produit->prix,
'address'=>auth()->user()->address,
'numero'=>auth()->user()->numero,
]); 
return redirect("/")->with("success","la commande est ajoute au panier");

    }
    public function storepersonalise(Request $request, $id_panier)
{
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'description' => 'required|string',
        'numero' => 'required|string',
        'address' => 'required|string',
    ]);

    $imagePath = null;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagePath = $image->store('images', 'public'); // stores in storage/app/public/images
    }

    Commande_personalise::create([
        'image' => $imagePath, // save path in the DB
        'description' => $request->description,
        'numero' => $request->numero,
        'address' => $request->address,
        'id_panier' => $id_panier,
    ]);

    return redirect('/')->with('success', 'La commande a été ajoutée au panier.');
}

}
