<!DOCTYPE html>
<html>
<head>
    <title>Ajouter Réception</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <h1>Ajouter une Réception</h1>
    <form action="{{ route('receptions.store') }}" method="POST">
        @csrf

        <label for="date_reception">Date de Réception:</label>
        <input type="date" name="date_reception" id="date_reception" required>
        <br>
        <label for="fournisseur_id">Fournisseur:</label>
        <select name="fournisseur_id" id="fournisseur_id" required>
            @foreach ($fournisseurs as $fournisseur)
                <option value="{{ $fournisseur->id }}">{{ $fournisseur->responsable }}</option>
            @endforeach 
        </select>
        <br>
        <label for="produit_id">Produit:</label>
        <select name="produit_id" id="produit_id" required>
            @foreach ($produits as $produit)
                <option value="{{ $produit->id }}">{{ $produit->designation }}</option>
            @endforeach
        </select>
        <br>
        <label for="quantite">Quantité:</label>
        <input type="number" name="quantite" id="quantite" required>
        <br>
        <label for="reference">Référence:</label>
        <input type="text" name="reference" id="reference" required>
        <br>
        <label for="responsable">Responsable:</label>
        <input type="text" name="responsable" id="responsable" required>
        <br>
        <button type="submit">Ajouter</button>
    </form>
    <a href="{{ route('receptions.index') }}">Retour à la liste</a>
</body>
</html>
