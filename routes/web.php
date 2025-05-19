<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivreurController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\PointDeVenteController;
use App\Http\Controllers\authentificationController;
use App\Http\Controllers\commandecontroller;
use App\Models\fournisseur;
use App\Models\Commande;
use App\Models\categorie;
use App\Models\Panier;
use App\Models\Produit;
use App\Models\Like;
use App\http\Middleware\md; 
use Illuminate\Support\Facades\Auth;
use App\Models\Compte;
use App\Models\Commentaire;
use App\Models\Star_rating;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::post('/categorie', function (Request $request) {
     $category = $request->input('category');
return redirect()->route('categorie', ['id' => $category ]);

});
Route::post('/search', function (Request $request) {
     $search = $request->input('search');
      
return redirect()->route('prds', ['search' => $search ]);

});
Route::get('/prds/{search}', function ($search) {
    $produits = Produit::where('nom', 'like', '%' . $search . '%')->get();
    $fournisseurs = Fournisseur::all();
    $categories = Categorie::all();
    return view('produits', compact('produits', 'fournisseurs', 'categories'));
})->name('prds');
Route::middleware('md:livreur')->group(function (){
    Route::get("/demarer/{id_livreur}/{commande}", function ($id_livreur, $commande) {
        $commande=Commande::find($commande);
        $commande->id_livreur=$id_livreur;
     
        $commande->save();
        return redirect()->back()->with('success', 'Commande en cours de livraison.');
    });
    Route::get("/terminer/{commande}", function ( $commande) {
        $commande=Commande::find($commande);
        $commande->etat="terminé";
     
        $commande->save();
        return redirect()->back()->with('success', 'Commande terminée.');
    });
    Route::get('/livreur', function () {
        $commandes = Commande::where('etat', "confirmé")->whereNull('id_livreur')->get();
        $produits = Produit::all();
        $fournisseurs = Fournisseur::all();
        $comptes = Compte::all();
        $paniers = Panier::all();
        $commandeslivreur=Commande::where("id_livreur", auth()->user()->id)->where("etat","confirmé")->get();
        $commandestermines=Commande::where("id_livreur", auth()->user()->id)->where("etat","terminé")->get();
        return view('livreur',compact('commandes', 'produits', 'fournisseurs', 'comptes','paniers',"commandeslivreur","commandestermines"));
    });
});

Route::get('/create', function () {
    return view('create');
});

Route::get('/login', function () {
    return view('login');
});


Route::get('/', function () {
    $produits = Produit::all();
    $fournisseurs=Fournisseur::all();;
    $categories = Categorie::all();
    return view('tout',compact('produits','categories','fournisseurs'));
});
Route::get('/index', function () {
    return view('index');
});
Route::get('/places', function () {
    $fournisseurs = Fournisseur::all();
    $categories = Categorie::all();
    $likes = Like::all();
   foreach ($fournisseurs as $fournisseur) {
        $fournisseur->likeCount = $likes->where('id_fournisseur', $fournisseur->id)->count();
        if(Auth::check()){
            $fournisseur->isLiked = $likes->where('id_client', auth()->user()->id)->where('id_fournisseur', $fournisseur->id)->count() > 0;
        } else {
            $fournisseur->isLiked = false;
        }
        
    }
    return view('places',compact('fournisseurs','categories'));
});
Route::get('/place/{id}', function ($id) {
    $fournisseurs = Fournisseur::all();
    $categories=Categorie::all();
    $fournisseur=Fournisseur::find($id);
    $produits=Produit::where('fournisseur_id',$id)->get();
    return view('place',compact('produits','fournisseur','fournisseurs','categories'));
});
Route::get('/categorie/{id}', function ($id) {
   
    $categorie=Categorie::find($id);
$categoriee=$categorie->categorie;
    $fournisseurs=Fournisseur::all();
    $produits=Produit::where("categorie_id",$id)->get();
    return view('categorie',compact('produits','fournisseurs','categoriee'));
})->name('categorie');
Route::get('/inscrire', function () {
    return view('inscrire');
});
Route::get('/connecter', function () {
    return view('connecter');
});


Route::get("/logout", function () {
    auth()->logout();
    return redirect('/')->with('success', 'Vous êtes déconnecté avec succès.');
})->name('logout');
 Route::middleware("md:admin")->group(function () {
    Route::post("/commentaire/{id}",function(Request $request, $id){
        dd($request);
        dd($id);
    $request->validate([
        'commentaire' => 'required|string|max:255',
        'produit_id' => 'required|exists:produits,id',
    ]);
    $commentaire = new Commentaire();
    $commentaire->produit_id = $id;
    $commentaire->compte_id = auth()->user()->id;
    $commentaire->commentaire = $request->input('commentaire');
    $commentaire->save();
    
    return redirect()->back()->with('success', 'Commentaire ajouté avec succès.');

})->name("commentaire.store");
    Route::get('/suprimercommande/{id}', function ($id) {
        $commande = Commande::find($id);
        if ($commande) {
            $commande->delete();
            return redirect()->back()->with('success', 'Commande supprimée avec succès.');
        }
        return redirect()->back()->with('error', 'Commande non trouvée.');
    });
    Route::get('/admin', function ()
{
    $fournisseurs = Fournisseur::all();
    $categories = Categorie::all();
    $commandes = Commande::all();
    $comptes = Compte::all();
    $produits=Produit::all();
    return view('admin', compact('fournisseurs', 'categories','commandes','comptes','produits'));
});
Route::get('/livreurs', [LivreurController::class, 'index'])->name('livreurs.index');
Route::post('/livreurs', [LivreurController::class, 'store'])->name('livreurs.store');
Route::get('/produits', [ProduitController::class, 'index'])->name('produits.index');
Route::post('/produits', [ProduitController::class, 'store'])->name('produits.store');


Route::get('/pointdeventes', [PointDeVenteController::class, 'index'])->name('pointdeventes.index');
Route::post('/pointdeventes', [PointDeVenteController::class, 'store'])->name('pointdeventes.store');



Route::get("/admin/livreur/edit/{id}", [LivreurController::class, 'edit'])->name('livreur.edit');
Route::put("/admin/livreur/update/{id}", [LivreurController::class, 'update'])->name('livreur.update');
Route::get("/admin/livreur/delete/{id}", [LivreurController::class, 'delete'])->name('livreur.delete');
Route::get("/admin/livreur/show/{id}", [LivreurController::class, 'show'])->name('livreur.show');




Route::get("/admin/pointdevente/edit/{id}", [PointDeVenteController::class, 'edit'])->name('pointdevente.edit');
Route::put("/admin/pointdevente/update/{id}", [PointDeVenteController::class, 'update'])->name('pointdeventes.update');
Route::get("/admin/pointdevente/delete/{id}", [PointDeVenteController::class, 'delete'])->name('pointdeventes.delete');


Route::get("/admin/produit/edit/{id}", [ProduitController::class, 'edit'])->name('produits.edit');
Route::put("/admin/produit/update/{id}", [ProduitController::class, 'update'])->name('produits.update');
Route::get("/admin/produit/delete/{id}", [ProduitController::class, 'delete'])->name('produits.delete');

Route::get('/deleteCommande/{id}', function ($id) {
    $commande = Commande::find($id);
    if ($commande) {
        $commande->delete();
        return redirect()->back()->with('success', 'Commande supprimée avec succès.');
    }
    return redirect()->back()->with('error', 'Commande non trouvée.');
});
Route::get("/confirmer/{id}", function ($id) {
    $commande=Commande::find($id);
    $commande->etat="confirmé";
    $commande->save();
    return redirect()->back()->with('success', 'Commande confirmée avec succès.');
});

   
});
Route::post('/connecter', [authentificationController::class, 'login'])->name('login.store');
Route::post('/registrer', [authentificationController::class, 'registrer'])->name('registrer.store');

Route::middleware('md:compte')->group(function () {
    Route::get("/comm/{id}",function($id){ 
        $produit=Produit::find($id);
        $commentaires=Commentaire::where('produit_id',$id)->get();
$averageNote = Star_rating::where('produit_id', $id)->avg('note');
        $comptes = Compte::all();

      
        return view("commentaires",compact('produit','commentaires','comptes','averageNote'));
    });
        
       Route::post("/commentaire/{id}",function(Request $request, $id){
    $request->validate([
        'commentaire' => 'required|string|max:255',
        'produit_id' => 'required|exists:produits,id',
    ]);
    $commentaire = new Commentaire();
    $commentaire->produit_id = $id;
    $commentaire->compte_id = auth()->user()->id;
    $commentaire->commentaire = $request->input('commentaire');
    $commentaire->save();
    
    return redirect()->back()->with('success', 'Commentaire ajouté avec succès.');

})->name("commentaire.store");
Route::post("/star_rating/{id}",function(Request $request, $id){
    $request->validate([
   
        'produit_id' => 'required|exists:produits,id',
    ]);
    $star = new Star_rating();
    $star->produit_id = $id;
    $star->compte_id = auth()->user()->id;
    $star->note = $request->input('note');
    try {
    $star->save();
} catch (\Illuminate\Database\QueryException $e) {
    // Check if it's a duplicate entry error (code 23000)
    if ($e->getCode() == 23000) {
        return redirect()->back()->with('error', 'Vous avez déjà noté ce produit.');
    }
    throw $e; // Re-throw if it's not a duplicate entry error
}
    
    
    return redirect()->back()->with('success', 'rating ajouté avec succès.');

})->name("star_rating");
    Route::get("/unlike/{id_client}/{fournisseur}", function ($id_client, $fournisseur) {
        $like = Like::where('id_client', $id_client)->where('id_fournisseur', $fournisseur)->first();
        if ($like) {
            $like->delete();
            return redirect()->back()->with('success', 'Fournisseur non aimé.');
        }
        return redirect()->back()->with('error', 'Erreur lors de la suppression du like.');
    });
    Route::get('/like/{id_client}/{fournisseur}', function ($id_client, $fournisseur) {
    
        Like::create([
             'id_client' => $id_client,
             'id_fournisseur' => $fournisseur,
         ]);
         return redirect()->back()->with('success', 'Fournisseur aimé avec succès.');
     });
    Route::get('/commander/{id}', function ($id) {
        $panier = Panier::where('id_client', auth()->user()->id)->first();
        $produit = Produit::find($id);
        return view('commander',compact('produit', 'panier'));
    });
    Route::get('/commandepersonelle', function () {
        $panier = Panier::where('id_client', auth()->user()->id)->first();
    
        return view('commandepers',compact('panier'));
    });
   
    Route::post('/commandes/{id_produit}/{id_panier}', [commandecontroller::class, 'store'])->name('commandes.store');
Route::post('/commandes_personalise/{id_panier}', [commandecontroller::class, 'storepersonalise'])->name('commandespersonalise.store');
Route::get('/deleteCommande/{id}', function ($id) {
    $commande = Commande::find($id);
    if ($commande) {
        $commande->delete();
        return redirect()->back()->with('success', 'Commande supprimée avec succès.');
    }
    return redirect()->back()->with('error', 'Commande non trouvée.');
});
Route::get('/panier', function () {
    $panier = Panier::where('id_client', auth()->user()->id)->first();
    $commandes=Commande::where('id_panier', $panier->id)->get();
  
    $produits=Produit::all();
    $fournisseurs = Fournisseur::all();
    return view('panier',compact('produits','panier','commandes','fournisseurs'));
});
 });
    
Route::get("/c",function(){
    return view("commentaires");
});