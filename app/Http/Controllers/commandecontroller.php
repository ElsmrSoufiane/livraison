<?php

namespace App\Http\Controllers;
use App\Models\Commande;
use App\Models\Commande_personalise;
use Illuminate\Http\Request;

class commandecontroller extends Controller
{
    public function store(Request $request,$id_produit,$id_panier)
    
    {
        $request->validate([
            'quantite'=> 'required|integer|min:1',
            'prix_total' => 'required|numeric|min:0',
            'address' => 'required|string|max:255',
            'numero' => 'required|string|max:15',
        ]);
    
Commande::create([
'id_produit'=>$id_produit,
'id_panier'=>$request->id_panier,
'quantite'=>$request->quantite,
'prix_total'=>$request->prix_total,
'address'=>$request->address,
'numero'=>$request->numero,
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
