<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{asset('laravel/public/lib/flaticon/font/flaticon.css')}}" rel="stylesheet">
    <div class="container">
        <h2>Liste des Produits</h2>
        @if($produits->isEmpty())
            <div class="alert alert-info" role="alert">
                Pas de produits pour l'instant
            </div>
        @else
            <div class="row">
                @foreach($produits as $produit)
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            @if (!empty($produit->discount))
                                <span class="badge rounded-pill text-bg-warning w-25 position-absolute m-2" style="right:0">
                                    - {{ $produit->discount }} <i class="fa fa-percent"></i>
                                </span>
                            @endif

                            <img class="w-100 h-100" src='laravel/public/pic/{{$produit->image}}' alt="Card image cap">
                            <div class="card-body">
                                
                                <h5 class="card-title">{{ $produit->libelle }}</h5>
                                <p class="card-text">{{ $produit->description }}</p>
                                <p class="card-text"><small class="text-muted">Ajouté le : {{ date_format(date_create($produit->date_creation), 'Y/m/d') }}</small></p>
                            </div>
                            <div class="card-footer bg-white" style="z-index: 10">
                                @if (!empty($produit->discount))
                                    <div class="h5">
                                        <span class="badge rounded-pill text-bg-danger">
                                            <strike>{{ $produit->prix }} MAD </strike> <i class="fa fa-solid fa-dollar"></i>
                                        </span>
                                    </div>
                                    <div class="h5">
                                        <span class="badge rounded-pill text-bg-success">
                                            Solde : {{ $produit->prix - (($produit->prix * $produit->discount) / 100) }} MAD
                                            <i class="fa fa-solid fa-dollar"></i>
                                        </span>
                                    </div>
                                @else
                                    <div class="h5">
                                        <span class="badge rounded-pill text-bg-success">
                                            {{ $produit->prix }} <i class="fa fa-solid fa-dollar"></i>
                                        </span>
                                    </div>
                                @endif
                                <div class="mt-2">
                                            <form method="post" action="{{ route('panier.ajouter', ['id' => $produit->id]) }}">
                                                @csrf
                                                <div class="input-group">
                                                    <input type="number" name="qty" value="1" min="1" class="form-control">
                                                    <button type="submit" class="btn btn-sm btn-success">Ajouter au panier</button>
                                                </div>
                                            </form>
                                        </div>

                            

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

