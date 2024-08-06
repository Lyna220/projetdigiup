<!DOCTYPE html>
<html>
<head>
    <title>Détails Client</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <h1>Détails Client</h1>
    <p><strong>Nom:</strong> {{ $client->nom }}</p>
    <p><strong>Prénom:</strong> {{ $client->prenom }}</p>
    <p><strong>Téléphone:</strong> {{ $client->telephone }}</p>
    <p><strong>Adresse:</strong> {{ $client->adresse }}</p>
    <p><strong>Genre:</strong> {{ $client->genre }}</p>
    <p><strong>CIN:</strong> {{ $client->cine }}</p>
    <p><strong>Première Visite:</strong> {{ $client->premiere_visite ? \Carbon\Carbon::parse($client->premiere_visite)->format('d/m/Y') : 'N/A' }}</p>
    <p><strong>Dernière Visite:</strong> {{ $client->derniere_visite ? \Carbon\Carbon::parse($client->derniere_visite)->format('d/m/Y') : 'N/A' }}</p>
    <p><strong>Client Depuis:</strong> {{ $client->client_depuis ? \Carbon\Carbon::parse($client->client_depuis)->format('d/m/Y') : 'N/A' }}</p>
    <p><strong>Total Vente:</strong> {{ $client->total_vente }}</p>
    <p><strong>Total Règlement:</strong> {{ $client->total_reglement }}</p>
    <p><strong>Reste dû:</strong> {{ $client->reste_du }}</p>
    <p><strong>Nombre Visites:</strong> {{ $client->nombre_visite }}</p>
    <p><strong>Assurance:</strong> {{ $client->assurance }}</p>
    <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning">Modifier</a>
    <a href="{{ route('clients.index') }}" class="btn btn-primary">Retour à la liste</a>
</body>
</html>
