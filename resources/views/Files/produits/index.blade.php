<!-- resources/views/produits/index.blade.php -->
@extends('laydmin.app')

@section('content')
    <div class="container py-2" >
        <h2>Liste des Produits</h2>

        @if(session('success'))
            <div class="alert alert-success mt-3" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('produits.create') }}" class="btn btn-primary mb-3">Ajouter un produit</a>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Libellé</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Catégorie</th>
                    <th scope="col">image</th>
                    <th scope="col">description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produits as $produit)
                <tr>
    <th scope="row">{{ $produit->id }}</th>
    <td>{{ $produit->libelle }}</td>
    <td>{{ $produit->prix }}</td>
    <td>{{ $produit->discount }}%</td>
    <td>{{ $produit->categorie->libelle }}</td>
    
    <!-- Nouvelles colonnes ajoutées avant les actions -->
    <td>
        <!-- Afficher l'image avec asset() -->
        <img src='laravel/public/pic/{{$produit->image}}'  class="img-fluid" style="max-width: 100px; max-height: 100px;">
    </td>
    <td>
        <!-- Afficher la description -->
        {{ $produit->description }}
    </td>
    
    
    <td>
        <a href="{{ route('produits.edit', $produit->id) }}" class="btn btn-primary"><i class=" fa fa-solid fa-pen"></i></a>
        <form action="{{ route('produits.destroy', $produit->id) }}" method="post" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit?')"><i class=" fa fa-solid fa-trash"></i></button>
        </form>
        
    </td>
</tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
