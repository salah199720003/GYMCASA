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
    <div class="container mt-4">
        <h1 class="mb-4">Détails de la Commande - Commande n°{{ $order->id }}</h1>

        @if ($order->lignesCommande->isEmpty())
            <p class="alert alert-warning">Aucun article dans cette commande.</p>
        @else
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Produit</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($order->lignesCommande as $ligneCommande)
                    <tr>
                        <td>{{ $ligneCommande->produit->libelle }}</td>
                        <td>
    @if ($ligneCommande->produit->discount > 0)
        <strike>{{ $ligneCommande->prix }} MAD</strike> <br>
        {{ $ligneCommande->prix - ($ligneCommande->prix * $ligneCommande->produit->discount / 100) }} MAD
    @else
        {{ $ligneCommande->prix }} MAD
    @endif
</td>

                        <td> x{{ $ligneCommande->quantite }}</td>
                        <td>{{ $ligneCommande->total }} MAD</td>
                    </tr>
                @endforeach
            </tbody>
            </table>

            <p class="font-weight-bold">Total de la commande: {{ $order->total }} MAD</p>
        @endif
    </div>

@endsection