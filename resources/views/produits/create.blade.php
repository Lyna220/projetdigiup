<!DOCTYPE html>
<html>
<head>
    <title>Ajouter Produit</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>
<body>
    <h1>Ajouter un Produit</h1>
    <form action="{{ route('produits.store') }}" method="POST">
        @csrf
        <label for="reference">Référence:</label>
        <input type="text" name="reference" id="reference" required>
        <br>
        <label for="designation">Désignation:</label>
        <input type="text" name="designation" id="designation" required>
        <br>
        <label for="categorie">Catégorie:</label>
        <select name="categorie" id="categorie">
            <option value="Monture">Monture</option>
            <option value="Verre">Verre</option>
            <option value="Lentille">Lentille</option>
            <option value="Accessoires">Accessoires</option>
            <option value="Autre">Autre</option>
        </select>
        <br>
        <label for="fournisseur_id">Fournisseur:</label>
        <select name="fournisseur_id" id="fournisseur_id">
            @foreach ($fournisseurs as $fournisseur)
                <option value="{{ $fournisseur->id }}">{{ $fournisseur->societe }}</option>
            @endforeach
        </select>
        <br>
        <label for="quantite_stock">Qté en stock:</label>
        <input type="number" name="quantite_stock" id="quantite_stock" required>
        <br>
        <label for="prix_achat">Prix d’achat:</label>
        <input type="number" name="prix_achat" id="prix_achat" step="0.01" required>
        <br>
        <label for="prix_vente">Prix de vente:</label>
        <input type="number" name="prix_vente" id="prix_vente" step="0.01" required>
        <br>
        <button type="submit">Ajouter</button>
    </form>
    <a href="{{ route('produits.index') }}">Retour à la liste</a>
</body>
</html>
