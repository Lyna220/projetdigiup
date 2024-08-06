<!DOCTYPE html>
<html>
<head>
    <title>Modifier Produit</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<body>
    <h1>Modifier Produit</h1>
    <form action="{{ route('produits.update', $produit->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="reference">Référence:</label>
        <input type="text" name="reference" id="reference" value="{{ $produit->reference }}" required>
        <br>
        <label for="designation">Désignation:</label>
        <input type="text" name="designation" id="designation" value="{{ $produit->designation }}" required>
        <br>
        <label for="categorie">Catégorie:</label>
        <select name="categorie" id="categorie">
            <option value="Monture" {{ $produit->categorie == 'Monture' ? 'selected' : '' }}>Monture</option>
            <option value="Verre" {{ $produit->categorie == 'Verre' ? 'selected' : '' }}>Verre</option>
            <option value="Lentille" {{ $produit->categorie == 'Lentille' ? 'selected' : '' }}>Lentille</option>
            <option value="Accessoires" {{ $produit->categorie == 'Accessoires' ? 'selected' : '' }}>Accessoires</option>
            <option value="Autre" {{ $produit->categorie == 'Autre' ? 'selected' : '' }}>Autre</option>
        </select>
        <br>
        <label for="fournisseur_id">Fournisseur:</label>
        <select name="fournisseur_id" id="fournisseur_id">
            @foreach ($fournisseurs as $fournisseur)
                <option value="{{ $fournisseur->id }}" {{ $produit->fournisseur_id == $fournisseur->id ? 'selected' : '' }}>
                    {{ $fournisseur->societe }}
                </option>
            @endforeach
        </select>
        <br>
        <label for="quantite_stock">Qté en stock:</label>
        <input type="number" name="quantite_stock" id="quantite_stock" value="{{ $produit->quantite_stock }}" required>
        <br>
        <label for="prix_achat">Prix d’achat:</label>
        <input type="number" name="prix_achat" id="prix_achat" step="0.01" value="{{ $produit->prix_achat }}" required>
        <br>
        <label for="prix_vente">Prix de vente:</label>
        <input type="number" name="prix_vente" id="prix_vente" step="0.01" min="0" value="{{ $produit->prix_vente }}" required>
        <br>
        <button type="submit">Mettre à Jour</button>
    </form>
    <a href="{{ route('produits.index') }}"><i class="fa-solid fa-arrow-left"></i></a>
</body>
</html>
