<!DOCTYPE html>
<html>
<head>
    <title>Ajouter Vente</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <h1>Ajouter une Vente</h1>
    <form action="{{ route('ventes.store') }}" method="POST">
        @csrf
        <label for="numero_facture">N° Facture:</label>
        <input type="text" name="numero_facture" id="numero_facture" required>
        <br>
        <label for="date_facture">Date de Facture:</label>
        <input type="date" name="date_facture" id="date_facture" required>
        <br>
        <label for="client_id">Client:</label>
        <select name="client_id" id="client_id" required>
            @foreach ($clients as $client)
            <option value="{{ $client->id }}">{{ $client->nom }} {{ $client->prenom }}</option>
            @endforeach
        </select>
        <br>
        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="Réglé">Réglé</option>
            <option value="Non Réglé">Non Réglé</option>
        </select>
        <br>
        <label for="total">Total:</label>
        <input type="number" name="total" id="total" required>
        <br>
        <label for="remise">Remise:</label>
        <input type="number" name="remise" id="remise" required>
        <br>
        <label for="avance">Avance:</label>
        <input type="number" name="avance" id="avance" required>
        <br>
        <label for="reste_a_payer">Reste à Payer:</label>
        <input type="number" name="reste_a_payer" id="reste_a_payer" required readonly>
        <br>
        <label for="responsable">Responsable:</label>
        <input type="text" name="responsable" id="responsable" required>
        <br>
        <button type="submit">Ajouter</button>
    </form>
    <a href="{{ route('ventes.index') }}">Retour à la liste</a>

    <script>
        function calculateResteAPayer() {
            const total = parseFloat(document.getElementById('total').value) || 0;
            const remise = parseFloat(document.getElementById('remise').value) || 0;
            const avance = parseFloat(document.getElementById('avance').value) || 0;
            const resteAPayer = total - remise - avance;
            document.getElementById('reste_a_payer').value = resteAPayer.toFixed(2);
        }

        document.getElementById('total').addEventListener('input', calculateResteAPayer);
        document.getElementById('remise').addEventListener('input', calculateResteAPayer);
        document.getElementById('avance').addEventListener('input', calculateResteAPayer);
    </script>
</body>
</html>
