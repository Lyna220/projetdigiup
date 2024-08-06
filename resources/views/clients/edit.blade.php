<!DOCTYPE html>
<html>
<head>
    <title>Modifier Client</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <h1>Modifier Client</h1>
    <form action="{{ route('clients.update', $client->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom" value="{{ $client->nom }}" required>
        <br>
        <label for="prenom">Prénom:</label>
        <input type="text" name="prenom" id="prenom" value="{{ $client->prenom }}" required>
        <br>
        <label for="telephone">Téléphone:</label>
        <input type="text" name="telephone" id="telephone" value="{{ $client->telephone }}" required>
        <br>
        <label for="adresse">Adresse:</label>
        <input type="text" name="adresse" id="adresse" value="{{ $client->adresse }}" required>
        <br>
        <label for="genre">Genre:</label>
        <input type="text" name="genre" id="genre" value="{{ $client->genre }}" required>
        <br>
        <label for="cine">CIN:</label>
        <input type="text" name="cine" id="cine" value="{{ $client->cine }}" required>
        <br>
        <label for="premiere_visite">Première Visite:</label>
        <input type="date" name="premiere_visite" id="premiere_visite" value="{{ $client->premiere_visite }}">
        <br>
        <label for="derniere_visite">Dernière Visite:</label>
        <input type="date" name="derniere_visite" id="derniere_visite" value="{{ $client->derniere_visite }}">
        <br>
        <label for="client_depuis">Client Depuis:</label>
        <input type="date" name="client_depuis" id="client_depuis" value="{{ $client->client_depuis }}">
        <br>
        <label for="total_vente">Total Vente:</label>
        <input type="number" name="total_vente" id="total_vente" step="0.01" value="{{ $client->total_vente }}">
        <br>
        <label for="total_reglement">Total Règlement:</label>
        <input type="number" name="total_reglement" id="total_reglement" step="0.01" value="{{ $client->total_reglement }}">
        <br>
        <label for="reste_du">Reste du:</label>
        <input type="number" name="reste_du" id="reste_du" step="0.01" value="{{ $client->reste_du }}">
        <br>
        <label for="nombre_visite">Nombre Visite:</label>
        <input type="number" name="nombre_visite" id="nombre_visite" value="{{ $client->nombre_visite }}">
        <br>
        <label for="assurance">Assurance:</label>
        <input type="text" name="assurance" id="assurance" value="{{ $client->assurance }}">
        <br>
        <button type="submit">Mettre à Jour</button>
    </form>
    <a href="{{ route('clients.index') }}"><i class="fa-solid fa-arrow-left"></i></a>
</body>
</html>
