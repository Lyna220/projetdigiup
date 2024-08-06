<!DOCTYPE html>
<html>
<head>
    <title>Ajouter Facture</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <h1>Ajouter une Facture</h1>
    <form action="{{ route('factures.store') }}" method="POST">
        @csrf
        <label for="numero_facture">N° Facture:</label>
        <input type="text" name="numero_facture" id="numero_facture" value="{{ old('numero_facture') }}" required>
        <br>
        <label for="date_facture">Date de Facture:</label>
        <input type="date" name="date_facture" id="date_facture" value="{{ old('date_facture') }}" required>
        <br>
        <label for="client_id">Client:</label>
        <select name="client_id" id="client_id" required>
            @foreach ($clients as $client)
                <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>
                    {{ $client->nom }} {{ $client->prenom }}
                </option>
            @endforeach
        </select>
        <br>
        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="Avance" {{ old('status') == 'Avance' ? 'selected' : '' }}>Avance</option>
            <option value="Réglé" {{ old('status') == 'Réglé' ? 'selected' : '' }}>Réglé</option>
            <option value="Non Réglé" {{ old('status') == 'Non Réglé' ? 'selected' : '' }}>Non Réglé</option>
        </select>
        <br>
        <label for="total">Total:</label>
        <input type="number" name="total" id="total" value="{{ old('total') }}" required>
        <br>
        <label for="remise">Remise:</label>
        <input type="number" name="remise" id="remise" value="{{ old('remise') }}">
        <br>
        <label for="avance">Avance:</label>
        <input type="number" name="avance" id="avance" value="{{ old('avance') }}">
        <br>
        <label for="reste_a_payer">Reste à Payer:</label>
        <input type="number" name="reste_a_payer" id="reste_a_payer" value="{{ old('reste_a_payer') }}">
        <br>
        <label for="responsable">Responsable:</label>
        <input type="text" name="responsable" id="responsable" value="{{ old('responsable') }}" required>
        <br>
        <button type="submit">Ajouter</button>
    </form>
    <a href="{{ route('factures.index') }}">Retour à la liste</a>
</body>
</html>
