<!DOCTYPE html>
<html>
<head>
    <title>Modifier Fournisseur</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<div class="container">
    <h1>Modifier Fournisseur</h1>
    <form action="{{ route('fournisseurs.update', $fournisseur->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="societe">Société:</label>
            <input type="text" name="societe" id="societe" class="form-control" value="{{ $fournisseur->societe }}" required>
        </div>

        <div class="form-group">
            <label for="responsable">Responsable:</label>
            <input type="text" name="responsable" id="responsable" class="form-control" value="{{ $fournisseur->responsable }}" required>
        </div>

        <div class="form-group">
            <label for="adresse">Adresse:</label>
            <input type="text" name="adresse" id="adresse" class="form-control" value="{{ $fournisseur->adresse }}" required>
        </div>

        <div class="form-group">
            <label for="ville">Ville:</label>
            <input type="text" name="ville" id="ville" class="form-control" value="{{ $fournisseur->ville }}" required>
        </div>

        <div class="form-group">
            <label for="telephone">Téléphone:</label>
            <input type="text" name="telephone" id="telephone" class="form-control" value="{{ $fournisseur->telephone }}" required>
        </div>

        <div class="form-group">
            <label for="mobile">Mobile:</label>
            <input type="text" name="mobile" id="mobile" class="form-control" value="{{ $fournisseur->mobile }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $fournisseur->email }}">
        </div>

        <div class="form-group">
            <label for="ice">ICE:</label>
            <input type="text" name="ice" id="ice" class="form-control" value="{{ $fournisseur->ice }}">
        </div>

        <div class="form-group">
            <label for="observation">Observation:</label>
            <textarea name="observation" id="observation" class="form-control">{{ $fournisseur->observation }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à Jour</button>
    </form>
    <a href="{{ route('fournisseurs.index') }}" class="btn btn-secondary"> <i class="fa-solid fa-arrow-left"></i></a>
</div>
</body>
</html>
