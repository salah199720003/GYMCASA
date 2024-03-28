<!-- resources/views/categories/show.blade.php -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{asset('laravel/public/lib/flaticon/font/flaticon.css')}}" rel="stylesheet">

    <div class="container py-2">
        @if ($categorie)
            <h4>{{ $categorie->libelle }} <span class="fa {{ $categorie->icone }}"></span></h4>
            
            <div class="container">
                <div class="row">
                    @forelse($categorie->produits as $produit)
                        <div class="col-md-6 mb-4">
                            <div class="card h-100">
                                @if (!empty($produit->discount))
                                    <span class="badge rounded-pill text-bg-warning w-25 position-absolute m-2" style="right:0">
                                        - {{ $produit->discount }} <i class="fa fa-percent"></i>
                                    </span>
                                @endif

                                <img class="card-img-top w-75 mx-auto" src='laravel/public/img/{{$produit->image}}'
                                    

                                <div class="card-body">
                                    <a href="{{ route('produits.show', ['id' => $produit->id]) }}" class="btn stretched-link"></a>
                                    <h5 class="card-title">{{ $produit->libelle }}</h5>
                                    <p class="card-text">{{ $produit->description }}</p>
                                    
                                </div>

                                <div class="card-footer bg-white" style="z-index: 10">
                                    @if (!empty($produit->discount))
                                        <div class="h5">
                                            <span class="badge rounded-pill text-bg-danger">
                                                <strike>{{ $produit->prix }}</strike> <i class="fa fa-solid fa-dollar"></i>
                                            </span>
                                        </div>
                                        <div class="h5">
                                            
                                        </div>
                                    @else
                                        <div class="h5">
                                            <span class="badge rounded-pill text-bg-success">
                                                {{ $produit->prix }} <i class="fa fa-solid fa-dollar"></i>
                                            </span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                    <div class="alert alert-info" role="alert">
            Aucun produit dans cette catégorie pour l'instant.
        </div>
                    @endforelse
                </div>
            </div>
        @else
            <p>Catégorie non trouvée.</p>
        @endif
    </div>
