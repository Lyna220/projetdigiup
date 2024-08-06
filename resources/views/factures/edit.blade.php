<!DOCTYPE html>
<html>
<head>
    <title>Modifier Facture</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <h1>Modifier Facture</h1>
    <form action="{{ route('factures.update', $facture->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="numero_facture">Numéro de Facture:</label>
        <input type="text" name="numero_facture" id="numero_facture" value="{{ old('numero_facture', $facture->numero_facture) }}" required>
        <br>

        <label for="date_facture">Date de Facture:</label>
        <input type="date" name="date_facture" id="date_facture" value="{{ old('date_facture', $facture->date_facture) }}" required>
        <br>

        <label for="client_id">Client:</label>
        <select name="client_id" id="client_id" required>
            @foreach ($clients as $client)
                <option value="{{ $client->id }}" {{ old('client_id', $facture->client_id) == $client->id ? 'selected' : '' }}>
                    {{ $client->nom }} {{ $client->prenom }}
                </option>
            @endforeach
        </select>
        <br>

        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="Avance" {{ old('status', $facture->status) == 'Avance' ? 'selected' : '' }}>Avance</option>
            <option value="Réglé" {{ old('status', $facture->status) == 'Réglé' ? 'selected' : '' }}>Réglé</option>
            <option value="Non Réglé" {{ old('status', $facture->status) == 'Non Réglé' ? 'selected' : '' }}>Non Réglé</option>
        </select>
        <br>

        <label for="total">Total:</label>
        <input type="number" name="total" id="total" value="{{ old('total', $facture->total) }}" step="0.01" required>
        <br>

        <label for="remise">Remise:</label>
        <input type="number" name="remise" id="remise" value="{{ old('remise', $facture->remise) }}" step="0.01">
        <br>

        <label for="avance">Avance:</label>
        <input type="number" name="avance" id="avance" value="{{ old('avance', $facture->avance) }}" step="0.01">
        <br>

        <label for="reste_a_payer">Reste à Payer:</label>
        <input type="number" name="reste_a_payer" id="reste_a_payer" value="{{ old('reste_a_payer', $facture->reste_a_payer) }}" step="0.01">
        <br>

        <label for="responsable">Responsable:</label>
        <input type="text" name="responsable" id="responsable" value="{{ old('responsable', $facture->responsable) }}" required>
        <br>

        <button type="submit" class="btn btn-primary">Mettre à Jour</button>
    </form>
    <a href="{{ route('factures.index') }}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left"></i></a>
</body>
</html>
