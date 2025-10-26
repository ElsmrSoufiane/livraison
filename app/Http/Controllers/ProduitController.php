<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Fournisseur;
use App\Models\Categorie;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class ImgBBService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('IMGbb_API_KEY'); // Get free API key from https://api.imgbb.com/
    }

    /**
     * Upload image to ImgBB
     */
    public function uploadImage($imageFile)
    {
        try {
            $response = $this->client->post('https://api.imgbb.com/1/upload', [
                'multipart' => [
                    [
                        'name' => 'key',
                        'contents' => $this->apiKey
                    ],
                    [
                        'name' => 'image',
                        'contents' => fopen($imageFile->getRealPath(), 'r'),
                        'filename' => $imageFile->getClientOriginalName()
                    ]
                ]
            ]);

            $data = json_decode($response->getBody(), true);

            if ($data['success']) {
                return [
                    'success' => true,
                    'url' => $data['data']['url'],
                    'delete_url' => $data['data']['delete_url'] ?? null,
                    'thumb_url' => $data['data']['thumb']['url'] ?? $data['data']['url']
                ];
            }

            return ['success' => false, 'error' => 'Upload failed'];

        } catch (\Exception $e) {
            Log::error('ImgBB Upload Error: ' . $e->getMessage());
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
}
class ProduitController extends Controller
{
    protected $imgBBService;

    public function __construct()
    {
        $this->imgBBService = new ImgBBService();
    }

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

        // Upload image to ImgBB if present
        $imageUrl = null;
        if ($request->hasFile('image')) {
            $uploadResult = $this->imgBBService->uploadImage($request->file('image'));
            
            if ($uploadResult['success']) {
                $imageUrl = $uploadResult['url'];
            } else {
                return back()->with('error', 'Erreur lors du téléchargement de l\'image: ' . $uploadResult['error']);
            }
        }

        // Création du produit
        $produit = new Produit();
        $produit->nom = $validated['Nom_du_produit'];
        $produit->prix = $validated['Prix'];
        $produit->categorie_id = $validated['Catégorie'];
        $produit->image = $imageUrl ?? '';
        $produit->save();

        return redirect()->route('produits.index')->with('success', 'Produit ajouté avec succès.');
    }

    public function edit($id)
    {
        $produit = Produit::with('categorie')->findOrFail($id);
        $categories = Categorie::all();
        return view('produit.edit', compact('produit', 'categories'));
    }

    public function update($id, Request $request)
    {
        $validated = $request->validate([
            'nom_de_produit' => 'required|string|max:255',
            'prix' => 'required|numeric|min:0',
            'categorie' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
        ]);

        $produit = Produit::findOrFail($id);
        $imageUrl = $produit->image;

        // Upload new image to ImgBB if present
        if ($request->hasFile('image')) {
            $uploadResult = $this->imgBBService->uploadImage($request->file('image'));
            
            if ($uploadResult['success']) {
                $imageUrl = $uploadResult['url'];
            } else {
                return back()->with('error', 'Erreur lors du téléchargement de l\'image: ' . $uploadResult['error']);
            }
        }

        // Update product
        $produit->update([
            'nom' => $validated['nom_de_produit'],
            'prix' => $validated['prix'],
            'categorie_id' => $validated['categorie'],
            'image' => $imageUrl,
        ]);

        return redirect()->route('produits.index')->with('success', 'Produit mis à jour avec succès.');
    }

    public function delete($id)
    {
        $produit = Produit::find($id);
        if ($produit) {
            // Note: With ImgBB free plan, images auto-delete after certain time
            // You can't delete via API on free plan
            $produit->delete();
        }
        return redirect()->route('produits.index')->with('success', 'Produit supprimé avec succès.');
    }
}
