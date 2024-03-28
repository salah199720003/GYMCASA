@extends('layout.master')
@section('header')
<style>
    body{
        background-color: white;
    }
</style>
    @include('layout.nav')
@endsection 
@section('main')



<div class="container py-2">
<div class="text-end mt-2">
        <a href="{{ route('panier.index') }}" class="btn btn-outline-success"><i class="fa fa-shopping-cart"></i> Panier</a>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <ul class="list-group list-group-flush position-sticky sticky-top">
                    <h4 class=" mt-4"><i class="fa fa-light fa-list"></i> Liste des catégories</h4>
                    <li class="list-group-item {{ is_null($categoryId) ? $activeClasses : '' }}">
                        <a class="btn btn-default w-100" href="{{ route('front.index') }}">
                            <i class="fa fa-solid fa-border-all"></i> Voir tous les produits
                        </a>
                    </li>
                    @foreach($categories as $categorie)
                        <li class="list-group-item {{ $categoryId == $categorie->id ? $activeClasses : '' }}">
                            <a class="btn btn-default w-100"
                               href="{{ route('front.index', ['id' => $categorie->id]) }}">
                                <i class="fa {{ $categorie->icone }}"></i> {{ $categorie->libelle }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col mt-4">
                <div class="row">
                    @forelse($produits as $produit)
                   
                        <div class="col-md-6 mb-4">
                            <div class="card h-100">
                                @if (!empty($produit->discount))
                                    <span class="badge rounded-pill text-bg-warning w-25 position-absolute m-2"
                                          style="right:0">
                                        - {{ $produit->discount }} <i class="fa fa-percent"></i>
                                    </span>
                                @endif
                                <img class="w-100 h-100" src='laravel/public/pic/{{$produit->image}}' alt="Card image cap">
                                <div class="card-body">
                                    
                                    <h5 class="card-title">{{ $produit->libelle }}</h5>
                                    <p class="card-text">{{ $produit->description }}</p>
                                </div>
                                <div class="card-footer bg-white" style="z-index: 10">
                                    @if (!empty($produit->discount))
                                        <div class="h5">
                                            <span class="badge rounded-pill text-bg-danger"  style="color:black !important">
                                                <strike>{{ $produit->prix }} MAD </strike>
                                            </span>
                                        </div>
                                        <div class="h5">
                                            <span class="badge rounded-pill text-bg-success" style="color:black !important">
                                                Solde : {{ $produit->prix - (($produit->prix * $produit->discount) / 100) }}
                                                MAD
                                               
                                            </span>
                                        </div>
                                    @else
                                        <div class="h5">
                                            <span class="badge rounded-pill text-bg-success"  style="color:black !important">
                                                {{ $produit->prix }} MAD 
                                            </span>
                                        </div>
                                    @endif
                                    <div class="mt-2">
                                            <form method="post" action="{{ route('panier.ajouter', ['id' => $produit->id]) }}">
                                                @csrf
                                                <div class="input-group">
                                                    <input type="number" name="qty" value="1" min="1" class="form-control">
                                                    <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-shopping-cart"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                   
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-info" role="alert">
                            Pas de produits pour l'instant
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

@endsection