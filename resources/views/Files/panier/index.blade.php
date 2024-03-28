<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Panier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-2">
        <div class="text-end mt-2">
            <a href="{{ route('front.index') }}" class="btn btn-outline-primary"><i class="fa fa-solid fa-store"></i> Boutique</a>
            <a href="{{ route('panier.index') }}" class="btn btn-outline-success"><i class="fa fa-shopping-cart"></i> Panier</a>
        </div>
    
    <div class="container py-2">
        @if (isset($success))
            <h1>Merci ! </h1>
            <div class="alert alert-success" role="alert">
                Votre commande avec le montant <strong>({{ $total }})</strong> <i class="fa fa-solid fa-dollar"></i> est bien ajoutée.
            </div>
            <hr>
        @else
            @php
                $total = 0;
            @endphp
            <h4>Panier ({{ count($panierItems) }})</h4>

            @if (empty($panierItems))
                <div class="alert alert-warning" role="alert">
                    Votre panier est vide ! Commençez vos achats <a class="btn btn-success btn-sm" href="{{ route('front.index') }}">Acheter des produits</a>
                </div>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Libelle</th>
                            <th scope="col">Quantité</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Remise</th>
                            <th scope="col"><i class="fa fa-percent"></i> prix remise</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($panierItems as $item)
                            @php
                                $prixProduit = $item->produit->prix;
                                $remise = $item->produit->discount;
                                $prixRemise = $prixProduit - ($prixProduit * $remise / 100);
                                $totalProduit = $item->quantite * $prixRemise;
                                $total += $totalProduit;
                                
                            @endphp
                            <tr>
                                <td>{{ $item->produit->id }}</td>
                                

                                <td>{{ $item->produit->libelle }}</td>
                                <td>x{{ $item->quantite }}</td>
                                <td><strike>{{ $prixProduit }} MAD <i class="fa fa-solid fa-dollar"></i></strike></td>
                                <td>- {{ $remise }}%</td>
                                <td>{{ $prixRemise }} MAD <i class="fa fa-solid fa-dollar"></i></td>
                                <td>{{ $totalProduit }} MAD <i class="fa fa-solid fa-dollar"></i></td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7" align="right"><strong>Total</strong></td>
                            <td>{{ $total }} MAD <i class="fa fa-solid fa-dollar"></i></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="d-flex justify-content-end">
                    <form method="post" action="{{ route('panier.validerCommande') }}">
                        @csrf
                        <input type="submit" class="btn btn-success mr-2" name="valider" value="Payer">
                    </form>
                    <form method="post" action="{{ route('panier.vider') }}">
                        @csrf
                        <input onclick="return confirm('Voulez vous vraiment vider le panier ?')" type="submit" class="btn btn-danger" name="vider" value="Vider le panier">
                    </form>
                </div>
            @endif
        @endif
    </div>
</body>
</html>
