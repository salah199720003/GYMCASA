<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie; 
use App\Models\Produit;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view('categories.index', compact('categories'));
    }
    public function show($id)
{
    $categorie = Categorie::with('produits')->find($id);

    if (!$categorie) {
        abort(404); // Ou gérez le cas où la catégorie n'est pas trouvée
    }

    return view('categories.show', compact('categorie'));
}
    

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required',
            'description' => 'required',
            'icone' => 'required',
        ]);

        Categorie::create($request->all());
        return redirect('/categories')->with('success', 'Catégorie ajoutée avec succès');
    }

    public function edit($id)
    {
        $category = Categorie::find($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required',
            'description' => 'required',
            'icone' => 'required',
        ]);

        $category = Categorie::find($id);
        $category->update($request->all());

        return redirect('/categories')->with('success', 'Catégorie modifiée avec succès');
    }

    public function destroy($id)
    {
        $category = Categorie::find($id);
        $category->delete();

        return redirect('/categories')->with('success', 'Catégorie supprimée avec succès');
    }
}
