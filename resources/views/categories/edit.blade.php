<!-- resources/views/categories/edit.blade.php -->
@extends('laydmin.app') <!-- Assuming your layout file is named 'app.blade.php' -->

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{asset('laravel/public/lib/flaticon/font/flaticon.css')}}" rel="stylesheet">
    <div class="container py-2">
        <h4>Modifier catégorie</h4>
        <i class="fas fa-search"></i>
        <form method="post" action="{{ route('categories.update', $category->id) }}">
            @csrf
            @method('put')
            <input type="hidden" name="id" value="{{ $category->id }}">

            <div class="mb-3">
                <label for="libelle" class="form-label">Libelle</label>
                <input type="text" class="form-control" id="libelle" name="libelle" value="{{ old('libelle', $category->libelle) }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description">{{ old('description', $category->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="icone" class="form-label">Icône</label>
                <input type="text" class="form-control" id="icone" name="icone" value="{{ old('icone', $category->icone) }}">
            </div>

            <button type="submit" class="btn btn-primary">Modifier catégorie</button>
        </form>
    </div>
@endsection

