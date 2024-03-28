@extends('laydmin.app') <!-- Assuming your layout file is named 'app.blade.php' -->

@section('content')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter catégorie avec icône</title>
    <!-- Font Awesome CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
<body>

<div class="container py-2">
    <h4>Ajouter catégorie avec icône</h4>
    
    
    <form method="post" action="{{ route('categories.store') }}">
        @csrf
        <div class="mb-3">
            <label for="libelle" class="form-label">Libelle</label>
            <input type="text" class="form-control" id="libelle" name="libelle" value="{{ old('libelle') }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="icone" class="form-label">Icône</label>
            <div class="input-group">
            <span class="input-group-text"><i class="fa fa-icon"></i></span>

                <input type="text" class="form-control" id="icone" name="icone" value="{{ old('icone') }}" placeholder="Entrez le nom de l'icône">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter catégorie</button>
    </form>
</div>

</body>
</html>
@endsection
