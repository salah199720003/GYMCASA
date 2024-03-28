@extends('layout.master')

@section('header')
    @include('layout.navadmin')
@endsection 

@section('main')
    <div class="container py-2">
        <h2>Modifier le Produit</h2>

        @if(session('success'))
            <div class="alert alert-success mt-3" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('produits.update', $produit->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="libelle" class="form-label">Libellé</label>
                <input type="text" class="form-control" id="libelle" name="libelle" value="{{ $produit->libelle }}" required>
            </div>
            <div class="mb-3">
                <label for="prix" class="form-label">Prix</label>
                <input type="number" class="form-control" id="prix" name="prix" value="{{ $produit->prix }}" required>
            </div>
            <div class="mb-3">
                <label for="discount" class="form-label">Discount</label>
                <input type="range" class="form-range" id="discount" name="discount" min="0" max="90" value="{{ $produit->discount * 100 }}">
                <span id="discountValue">{{ $produit->discount * 100 }}</span>% <!-- Affiche la valeur actuelle du range -->
            </div>
            <div class="mb-3">
                <label for="categorie" class="form-label">Catégorie</label>
                <select class="form-control" id="categorie" name="categorie" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $produit->id_categorie == $category->id ? 'selected' : '' }}>
                            {{ $category->libelle }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $produit->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                <img src="{{ asset('laravel/public/pic/'.$produit->image) }}" alt="{{ $produit->libelle }}" class="img-fluid mt-2" width="150">
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>

    <!-- Script pour mettre à jour la valeur du discount en temps réel -->
    <script>
        const discountInput = document.getElementById('discount');
        const discountValue = document.getElementById('discountValue');

        discountInput.addEventListener('input', function () {
            discountValue.textContent = this.value;
        });
    </script>
@endsection
