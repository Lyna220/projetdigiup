<!DOCTYPE html>
<html>
<head>
    <title>Modifier Vente</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <h1>Modifier Vente</h1>
    <form action="{{ route('ventes.update', $vente->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="numero_facture">N° Facture:</label>
        <input type="text" name="numero_facture" id="numero_facture" value="{{ $vente->numero_facture }}" required>
        <br>
        <label for="date_facture">Date de Facture:</label>
        @php
            $dateFacture = $vente->date_facture instanceof \Carbon\Carbon ? $vente->date_facture->format('Y-m-d') : $vente->date_facture;
        @endphp
        <input type="date" name="date_facture" id="date_facture" value="{{ $dateFacture }}" required>
        <br>
        <label for="client_id">Client:</label>
        <select name="client_id" id="client_id" required>
            @foreach ($clients as $client)
                <option value="{{ $client->id }}" {{ $vente->client_id == $client->id ? 'selected' : '' }}>
                    {{ $client->nom }} {{ $client->prenom }}
                </option>
            @endforeach
        </select>
        <br>
        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="Réglé" {{ $vente->status == 'Réglé' ? 'selected' : '' }}>Réglé</option>
            <option value="Non Réglé" {{ $vente->status == 'Non Réglé' ? 'selected' : '' }}>Non Réglé</option>
        </select>
        <br>
        <label for="total">Total:</label>
        <input type="number" name="total" id="total" value="{{ $vente->total }}" required>
        <br>
        <label for="remise">Remise:</label>
        <input type="number" name="remise" id="remise" value="{{ $vente->remise }}" required>
        <br>
        <label for="avance">Avance:</label>
        <input type="number" name="avance" id="avance" value="{{ $vente->avance }}" required>
        <br>
        <label for="reste_a_payer">Reste à Payer:</label>
        <input type="number" name="reste_a_payer" id="reste_a_payer" value="{{ $vente->reste_a_payer }}" required readonly>
        <br>
        <label for="responsable">Responsable:</label>
        <input type="text" name="responsable" id="responsable" value="{{ $vente->responsable }}" required>
        <br>
        <button type="submit">Mettre à Jour</button>
    </form>
    <a href="{{ route('ventes.index') }}"><i class="fa-solid fa-arrow-left"></i></a>

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
