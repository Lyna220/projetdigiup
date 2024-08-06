<!DOCTYPE html>
<html>
<head>
    <title>Détails Réception</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>
<body>
    <h1>Détails Réception</h1>
    <p><strong>N° Réception:</strong> {{ $reception->numero_reception }}</p>
    <p><strong>Date de Réception:</strong> {{ $reception->date_reception }}</p>
    <p><strong>Fournisseur:</strong> {{ $reception->fournisseur->societe }}</p>
    <p><strong>Produit:</strong> {{ $reception->produit->designation }}</p>
    <p><strong>Quantité:</strong> {{ $reception->quantite }}</p>
    <p><strong>Responsable:</strong> {{ $reception->responsable }}</p>
    <a href="{{ route('receptions.edit', $reception->id) }}">Modifier</a>
    <a href="{{ route('receptions.index') }}">Retour à la liste</a>
</body>
</html>
