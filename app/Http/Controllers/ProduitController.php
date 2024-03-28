<?php
// app/Http/Controllers/ProduitController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Categorie;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::all();
        return view('produits.index', compact('produits'));
    }
    public function frontIndex()
    {
        $produits = Produit::all();
        return view('produits.front_index', compact('produits'));
    }

    public function create()
    {
        $categories = Categorie::all();
        return view('produits.create', compact('categories'));
    }
   
    


    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required',
            'prix' => 'required|numeric|min:0',
            'discount' => 'numeric|min:0|max:90',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'categorie' => 'required|exists:categorie,id',
        ]);

        // Gérer le téléchargement de l'image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = uniqid() . '_' . $image->getClientOriginalName();
            $image->move(public_path('pic'), $filename);

        } else {
            $filename = 'produit.png'; // Utilisez une image par défaut ou générée
        }
        $discount = $request->input('discount') / 100;

        // Créer le produit
        Produit::create([
            'libelle' => $request->libelle,
            'prix' => $request->prix,
            'discount' => $request->discount,
            'id_categorie' => $request->categorie,
            'date_creation' => now(),
            'description' => $request->description,
            'image' => $filename,
        ]);

        return redirect()->route('produits.index')->with('success', 'Produit ajouté avec succès');
    }
    public function show($id)
{
    $produit = Produit::find($id);

    if (!$produit) {
        abort(404); // or handle the case when the product is not found
    }

    return view('produits.show', compact('produit'));
}

    public function edit($id)
    {
        $produit = Produit::find($id);
        $categories = Categorie::all();
        return view('produits.edit', compact('produit', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required',
            'prix' => 'required|numeric|min:0',
            'discount' => 'numeric|min:0|max:90',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'categorie' => 'required|exists:categorie,id',
        ]);

        $produit = Produit::find($id);

        $filename = $produit->image;

        // Gérer le téléchargement de la nouvelle image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = uniqid() . '_' . $image->getClientOriginalName();
            $image->move(public_path('pic'), $filename);
        }

        // Mettre à jour le produit
        $produit->update([
            'libelle' => $request->libelle,
            'prix' => $request->prix,
            'discount' => $request->discount,
            'id_categorie' => $request->categorie,
            'description' => $request->description,
            'image' => $filename,
        ]);

        return redirect()->route('produits.index')->with('success', 'Produit modifié avec succès');
    }

    public function destroy($id)
    {
        $produit = Produit::find($id);
        $produit->delete();

        return redirect()->route('produits.index')->with('success', 'Produit supprimé avec succès');
    }
}
