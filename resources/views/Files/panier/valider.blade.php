<!-- resources/views/panier/valider.blade.php -->


    <div class="container py-2">
        <h2>Validation de la Commande</h2>
        @if($success)
            <div class="alert alert-success" role="alert">
                Votre commande a été validée avec succès !
            </div>
        @else
            <div class="alert alert-danger" role="alert">
                Une erreur est survenue lors de la validation de la commande.
            </div>
        @endif
        <a href="{{ route('panier.index') }}" class="btn btn-primary">Retour au Panier</a>
    </div>
