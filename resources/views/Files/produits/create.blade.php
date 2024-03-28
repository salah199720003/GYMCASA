@extends('layout.master')

@section('header')
    @include('layout.navadmin')
@endsection 

@section('main')
    <div class="container py-2">
        <h2>Ajouter un Produit</h2>

        @if(session('success'))
            <div class="alert alert-success mt-3" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('produits.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="libelle" class="form-label">Libellé</label>
                <input type="text" class="form-control" id="libelle" name="libelle" required>
            </div>
            <div class="mb-3">
                <label for="prix" class="form-label">Prix</label>
                <input type="number" class="form-control" id="prix" name="prix" required>
            </div>
            <div class="mb-3">
                <label for="discount" class="form-label">Discount</label>
                <input type="range" class="form-range" id="discount" name="discount" min="0" max="90">
                <span id="discountValue">0</span>% <!-- Affiche la valeur actuelle du range -->
            </div>
            <div class="mb-3">
                <label for="categorie" class="form-label">Catégorie</label>
                <select class="form-control" id="categorie" name="categorie" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->libelle }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>

    <script>
        const discountInput = document.getElementById('discount');
        const discountValue = document.getElementById('discountValue');

        discountInput.addEventListener('input', function () {
            discountValue.textContent = this.value;
        });
    </script>
@endsection
