<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index(Request $request)
    {
        $categoryId = $request->query('id');
        $categories = DB::table('categorie')->get();

        if (!is_null($categoryId)) {
            $produits = DB::table('produit')
                ->where('id_categorie', $categoryId)
                ->orderByDesc('date_creation')
                ->get();
        } else {
            $produits = DB::table('produit')
                ->orderByDesc('date_creation')
                ->get();
        }

        $activeClasses = 'active bg-success rounded border-success';

        return view('front.index', compact('categories', 'categoryId', 'produits', 'activeClasses'));
    }
}
