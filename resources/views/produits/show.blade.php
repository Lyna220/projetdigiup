<!DOCTYPE html>
<html>
<head>
    <title>Détails Produit</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<body>
    <h1>Détails Produit</h1>
    <p><strong>Référence:</strong> {{ $produit->reference }}</p>
    <p><strong>Désignation:</strong> {{ $produit->designation }}</p>
    <p><strong>Catégorie:</strong> {{ $produit->categorie }}</p>
    <p><strong>Fournisseur:</strong> {{ $produit->fournisseur->societe }}</p>
    <p><strong>Qté en stock:</strong> {{ $produit->quantite_stock }}</p>
    <p><strong>Prix d’achat:</strong> {{ $produit->prix_achat }}</p>
    <p><strong>Prix de vente:</strong> {{ $produit->prix_vente }}</p>

    <a href="{{ route('produits.index') }}"><i class="fa-solid fa-arrow-left"></i></a>
</body>
</html>
