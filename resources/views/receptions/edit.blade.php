<!DOCTYPE html>
<html>
<head>
    <title>Modifier Réception</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <h1>Modifier Réception</h1>
    <form action="{{ route('receptions.update', $reception->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="date_reception">Date de Réception:</label>
        <input type="date" name="date_reception" id="date_reception" value="{{ $reception->date_reception }}" required>
        <br>

        <label for="fournisseur_id">Fournisseur:</label>
        <select name="fournisseur_id" id="fournisseur_id" required>
            @foreach ($fournisseurs as $fournisseur)
                <option value="{{ $fournisseur->id }}" {{ $reception->fournisseur_id == $fournisseur->id ? 'selected' : '' }}>
                    {{ $fournisseur->societe }}
                </option>
            @endforeach
        </select>
        <br>

        <label for="produit_id">Produit:</label>
        <select name="produit_id" id="produit_id" required>
            @foreach ($produits as $produit)
                <option value="{{ $produit->id }}" {{ $reception->produit_id == $produit->id ? 'selected' : '' }}>
                    {{ $produit->designation }}
                </option>
            @endforeach
        </select>
        <br>

        <label for="quantite">Quantité:</label>
        <input type="number" name="quantite" id="quantite" value="{{ $reception->quantite }}" required>
        <br>

        <label for="reference">Référence:</label>
        <input type="text" name="reference" id="reference" value="{{ $reception->reference }}" required>
        <br>

        <label for="responsable">Responsable:</label>
        <input type="text" name="responsable" id="responsable" value="{{ $reception->responsable }}" required>
        <br>

        <button type="submit" class="btn btn-primary">Mettre à Jour</button>
    </form>
    <a href="{{ route('receptions.index') }}" class="btn btn-secondary">Retour à la liste</a>
</body>
</html>
