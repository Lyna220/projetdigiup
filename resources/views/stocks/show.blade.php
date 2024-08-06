<!DOCTYPE html>
<html>
<head>
    <title>Détails Stock</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>
<body>
    <div class="container">
        <h1>Détails du Stock</h1>
        <div class="card">
            <div class="card-header">
                Stock #{{ $stock->id }}
            </div>
            <div class="card-body">
                <p><strong>Référence :</strong> {{ $stock->produit->reference ?? 'Non défini' }}</p>
                <p><strong>Désignation :</strong> {{ $stock->produit->designation ?? 'Non défini' }}</p>
                <p><strong>Catégorie :</strong> {{ $stock->produit->categorie ?? 'Non défini' }}</p>
                <p><strong>Stock Min :</strong> {{ $stock->stock_min }}</p>
                <p><strong>Stock Max :</strong> {{ $stock->stock_max }}</p>
                <p><strong>Stock Réel :</strong> {{ $stock->stock_reel }}</p>
                <p><strong>Prix de Vente :</strong> {{ $stock->prix_vente }}</p>
                <a href="{{ route('stocks.index') }}" class="btn btn-primary">Retour à la liste</a>
            </div>
        </div>
    </div>

</body>
</html>
