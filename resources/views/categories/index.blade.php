@extends('layout.master')
@section('menu3','active')
@section('header')
    @include('layout.nav')
@endsection 
@section('main')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Ma Boutique</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categories.index') }}">Catégories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('produits.index') }}">Produits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('all.orders') }}">Commandes</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <div class="container py-2" >
        <h2>Liste des catégories</h2>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">
       Ajouter <i class="fa fa-solid fa-plus"></i>
</a>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Libelle</th>
                    <th>Description</th>
                    <th>Icone</th>
                    <th>Date</th>
                    <th>Opérations</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $categorie)
                    <tr>
                        <td>{{ $categorie->id }}</td>
                        <td>{{ $categorie->libelle }}</td>
                        <td>{{ $categorie->description }}</td>
                        <td>
                            <i class="fa {{ $categorie->icone }}"></i>
                        </td>
                        <td>{{ $categorie->date_creation }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $categorie->id) }}" class="btn btn-primary"><i class=" fa fa-solid fa-pen"></i></a>
                            <form action="{{ route('categories.destroy', $categorie->id) }}" method="post" style="display: inline-block;">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer la catégorie {{ $categorie->libelle }} ?')"><i class=" fa fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

    