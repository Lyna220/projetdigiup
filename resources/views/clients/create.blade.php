<!DOCTYPE html>
<html>
<head>
    <title>Ajouter Client</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>
<body>
<div class="container">
    <h1>Ajouter un Client</h1>
    <form action="{{ route('clients.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="prenom">Prénom:</label>
            <input type="text" name="prenom" id="prenom" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="telephone">Téléphone:</label>
            <input type="text" name="telephone" id="telephone" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="genre">Genre:</label>
            <select name="genre" id="genre" class="form-control" required>
                <option value="M">Homme</option>
                <option value="F">Femme</option>
            </select>
        </div>

        <div class="form-group">
            <label for="cine">CIN:</label>
            <input type="text" name="cine" id="cine" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="adresse">Adresse:</label>
            <input type="text" name="adresse" id="adresse" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="premiere_visite">Première Visite:</label>
            <input type="date" name="premiere_visite" id="premiere_visite" class="form-control">
        </div>

        <div class="form-group">
            <label for="derniere_visite">Dernière Visite:</label>
            <input type="date" name="derniere_visite" id="derniere_visite" class="form-control">
        </div>

        <div class="form-group">
            <label for="client_depuis">Client Depuis:</label>
            <input type="date" name="client_depuis" id="client_depuis" class="form-control">
        </div>

        <div class="form-group">
            <label for="total_vente">Total Vente:</label>
            <input type="number" step="0.01" name="total_vente" id="total_vente" class="form-control">
        </div>

        <div class="form-group">
            <label for="total_reglement">Total Règlement:</label>
            <input type="number" step="0.01" name="total_reglement" id="total_reglement" class="form-control">
        </div>

        <div class="form-group">
            <label for="reste_du">Reste Du:</label>
            <input type="number" step="0.01" name="reste_du" id="reste_du" class="form-control">
        </div>

        <div class="form-group">
            <label for="nombre_visite">Nombre de Visites:</label>
            <input type="number" name="nombre_visite" id="nombre_visite" class="form-control">
        </div>

        <div class="form-group">
            <label for="assurance">Assurance:</label>
            <input type="text" name="assurance" id="assurance" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
    <a href="{{ route('clients.index') }}" class="btn btn-secondary">Retour à la liste</a>
</div>
</body>
</html>
