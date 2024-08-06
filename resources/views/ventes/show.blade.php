<!DOCTYPE html>
<html>
<head>
    <title>Détails Vente</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <h1>Détails Vente</h1>
    <p><strong>Numéro de Facture:</strong> {{ $vente->numero_facture }}</p>
    <p><strong>Date de Facture:</strong> {{ $vente->date_facture->format('d/m/Y') }}</p>
    <p><strong>Client:</strong> {{ $vente->client ? $vente->client->nom . ' ' . $vente->client->prenom : 'N/A' }}</p>
    <p><strong>Status:</strong> {{ $vente->status }}</p>
    <p><strong>Total:</strong> {{ $vente->total }}</p>
    <p><strong>Remise:</strong> {{ $vente->remise }}</p>
    <p><strong>Avance:</strong> {{ $vente->avance }}</p>
    <p><strong>Reste à Payer:</strong> {{ $vente->reste_a_payer }}</p>
    <p><strong>Responsable:</strong> {{ $vente->responsable }}</p>
    <a href="{{ route('ventes.edit', $vente->id) }}" class="btn btn-warning">Modifier</a>
    <a href="{{ route('ventes.index') }}" class="btn btn-primary">Retour à la liste</a>
</body>
</html>
