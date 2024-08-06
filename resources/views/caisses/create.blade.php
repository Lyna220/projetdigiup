<!DOCTYPE html>
<html>
<head>
    <title>Ajouter Enregistrement Caisse</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <h1>Ajouter un Enregistrement de Caisse</h1>
    <form action="{{ route('caisses.store') }}" method="POST">
        @csrf
        <label for="facture_id">Facture:</label>
        <select name="facture_id" id="facture_id" required>
            @foreach($factures as $facture)
                <option value="{{ $facture->id }}">{{ $facture->numero_facture }}</option>
            @endforeach
        </select>
        <br>
        <label for="date_facture">Date de Facture:</label>
        <input type="date" name="date_facture" id="date_facture" required>
        <br>
        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="Avance">Avance</option>
            <option value="Réglé">Réglé</option>
            <option value="Non Réglé">Non Réglé</option>
        </select>        <br>
        <label for="client_id">Client:</label>
        <select name="client_id" id="client_id" required>
            @foreach($clients as $client)
                <option value="{{ $client->id }}">{{ $client->nom }} {{ $client->prenom }}</option> 
            @endforeach
        </select>
        <br>
        <label for="paiement">Paiement:</label>
        <input type="text" name="paiement" id="paiement" required>
        <br>
        <button type="submit">Ajouter</button>
    </form>
    <a href="{{ route('caisses.index') }}">Retour à la liste</a>
</body>
</html>
