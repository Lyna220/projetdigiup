<!DOCTYPE html>
<html>
<head>
    <title>Ajouter Fournisseur</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <h1>Ajouter un Fournisseur</h1>
    <form action="{{ route('fournisseurs.store') }}" method="POST">
        @csrf
        
        <label for="societe">Société:</label>
        <input type="text" name="societe" id="societe" required>
        <br>

        <label for="responsable">Responsable:</label>
        <input type="text" name="responsable" id="responsable" required>
        <br>

        <label for="adresse">Adresse:</label>
        <input type="text" name="adresse" id="adresse" required>
        <br>

        <label for="ville">Ville:</label>
        <input type="text" name="ville" id="ville" required>
        <br>

        <label for="telephone">Téléphone:</label>
        <input type="text" name="telephone" id="telephone" required>
        <br>

        <label for="mobile">Mobile:</label>
        <input type="text" name="mobile" id="mobile" required>
        <br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        <br>

        <label for="ice">ICE:</label>
        <input type="text" name="ice" id="ice">
        <br>

        <label for="observation">Observation:</label>
        <textarea name="observation" id="observation"></textarea>
        <br>

        <button type="submit">Ajouter</button>
    </form>
    <a href="{{ route('fournisseurs.index') }}">Retour à la liste</a>

    @if ($errors->any())
    <div class="alert alert-error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</body>
</html>
