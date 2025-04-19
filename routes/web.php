<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivreurController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\PointDeVenteController;
use App\Http\Controllers\authentificationController;
use App\Http\Controllers\commandecontroller;
use App\Models\Fournisseur;
use App\Models\Categorie;
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

Route::get('/categorie', function () {
    return view('categorie');
});
Route::get('/create', function () {
    return view('create');
});

Route::get('/login', function () {
    return view('login');
});


Route::get('/panier', function () {
    return view('panier');
});
Route::get('/', function () {
    return view('tout');
});
Route::get('/index', function () {
    return view('index');
});
Route::get('/places', function () {
    return view('places');
});Route::get('/place', function () {
    return view('place');
});Route::get('/inscrire', function () {
    return view('inscrire');
});
Route::get('/connecter', function () {
    return view('connecter');
});

Route::get('/commander', function () {
    return view('commander');
});
Route::get('/commandepersonelle', function () {
    return view('commandepers');
});

Route::get('/admin', function ()
{
    $fournisseurs = Fournisseur::all();
    $categories = Categorie::all();
    return view('admin', compact('fournisseurs', 'categories'));
});
Route::get('/livreurs', [LivreurController::class, 'index'])->name('livreurs.index');
Route::post('/livreurs', [LivreurController::class, 'store'])->name('livreurs.store');
Route::get('/produits', [ProduitController::class, 'index'])->name('produits.index');
Route::post('/produits', [ProduitController::class, 'store'])->name('produits.store');


Route::get('/pointdeventes', [PointDeVenteController::class, 'index'])->name('pointdeventes.index');
Route::post('/pointdeventes', [PointDeVenteController::class, 'store'])->name('pointdeventes.store');
Route::post('/commandes', [commandecontroller::class, 'store'])->name('commandes.store');
Route::post('/commandes_personalise', [commandecontroller::class, 'storepersonalise'])->name('commandespersonalise.store');


Route::get("/admin/livreur/edit/{id}", [LivreurController::class, 'edit'])->name('livreur.edit');
Route::put("/admin/livreur/update/{id}", [LivreurController::class, 'update'])->name('livreur.update');
Route::get("/admin/livreur/delete/{id}", [LivreurController::class, 'delete'])->name('livreur.delete');




Route::get("/admin/pointdevente/edit/{id}", [PointDeVenteController::class, 'edit'])->name('pointdevente.edit');
Route::put("/admin/pointdevente/update/{id}", [PointDeVenteController::class, 'update'])->name('pointdeventes.update');
Route::get("/admin/pointdevente/delete/{id}", [PointDeVenteController::class, 'delete'])->name('pointdeventes.delete');


Route::get("/admin/produit/edit/{id}", [ProduitController::class, 'edit'])->name('produits.edit');
Route::put("/admin/produit/update/{id}", [ProduitController::class, 'update'])->name('produits.update');
Route::get("/admin/produit/delete/{id}", [ProduitController::class, 'delete'])->name('produits.delete');



Route::post('/connecter', [authentificationController::class, 'login'])->name('login.store');
Route::post('/registrer', [authentificationController::class, 'registrer'])->name('registrer.store');
