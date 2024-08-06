<!DOCTYPE html>
<html>
<head>
    <title>Détails Facture</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <h1>Détails Facture</h1>
    <p><strong>Numéro de Facture:</strong> {{ $facture->numero_facture }}</p>
    <p><strong>Date de Facture:</strong> {{ $facture->date_facture }}</p>
    <p><strong>Client:</strong> {{ $facture->client->nom }} {{ $facture->client->prenom }}</p>
    <p><strong>Status:</strong> {{ $facture->status }}</p>
    <p><strong>Total:</strong> {{ $facture->total }} DH</p>
    <p><strong>Remise:</strong> {{ $facture->remise ?? 'N/A' }} DH</p>
    <p><strong>Avance:</strong> {{ $facture->avance ?? 'N/A' }} DH</p>
    <p><strong>Reste à Payer:</strong> {{ $facture->reste_a_payer ?? 'N/A' }} DH</p>
    <p><strong>Responsable:</strong> {{ $facture->responsable }}</p>
    <a href="{{ route('factures.edit', $facture->id) }}" class="btn btn-primary">Modifier</a>
    <a href="{{ route('factures.index') }}" class="btn btn-secondary">Retour à la liste</a>
</body>
</html>
