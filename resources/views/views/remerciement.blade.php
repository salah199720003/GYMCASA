<!DOCTYPE html>
<html lang="en">

<head>
    <title>Remerciement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="text-end mt-2">
            <a href="{{ route('front.index') }}" class="btn btn-outline-primary"><i class="fa fa-solid fa-store"></i> Boutique</a>
            <a href="{{ route('panier.index') }}" class="btn btn-outline-success"><i class="fa fa-shopping-cart"></i> Panier</a>
        </div>

    <div class="container py-2">
        @if (session('success'))
            <h1>Merci ! </h1>
            <div class="alert alert-success" role="alert">
                Votre commande avec le montant <strong>({{ session('total') }} MAD)</strong> <i class="fa fa-solid fa-dollar"></i> est payé.
            </div>
           
            <hr>
        @endif
    </div>

</body>

</html>
