<!DOCTYPE html>
<html>
<head>
    <title>Liste des Achats</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        #searchInput {
            margin-bottom: 20px;
            padding: 10px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
        }

        .action-buttons {
            display: flex;
            gap: 5px;
        }
    </style>
</head>
<body>
@include('layouts.layout')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Liste des Achats</h1>
        <a href="{{ route('receptions.create') }}" class="btn btn-primary">Ajouter une Réception</a>
    </div>

    <!-- Champ de recherche -->
    <input type="text" id="searchInput" class="form-control" placeholder="Rechercher...">

    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>N° Réception</th>
                <th>Date de Réception</th>
                <th>Fournisseur</th>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Référence</th>
                <th>Responsable</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="receptionTableBody">
            @foreach ($receptions as $reception)
                <tr>
                    <td>{{ $reception->id }}</td>
                    <td>{{ $reception->numero_reception }}</td>
                    <td>{{ $reception->date_reception }}</td>
                    <td>{{ $reception->fournisseur->societe }}</td>
                    <td>{{ $reception->produit->designation }}</td>
                    <td>{{ $reception->quantite }}</td>
                    <td>{{ $reception->reference }}</td>
                    <td>{{ $reception->responsable }}</td>
                    <td class="action-buttons">
                        <a href="{{ route('receptions.show', $reception->id) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="{{ route('receptions.edit', $reception->id) }}" class="btn btn-info btn-sm">Modifier</a>
                        <form action="{{ route('receptions.destroy', $reception->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('home') }}" class="btn btn-secondary mt-3">Retour à l'accueil</a>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const tableBody = document.getElementById('receptionTableBody');
    
    if (!tableBody) {
        console.error('Element with ID "receptionTableBody" not found.');
        return;
    }

    searchInput.addEventListener('keyup', function() {
        const filter = searchInput.value.toLowerCase();
        const rows = tableBody.getElementsByTagName('tr');
        
        for (let i = 0; i < rows.length; i++) {
            const cells = rows[i].getElementsByTagName('td');
            let rowText = '';
            
            for (let j = 0; j < cells.length; j++) {
                rowText += cells[j].textContent.toLowerCase() + ' ';
            }
            
            if (rowText.includes(filter)) {
                rows[i].style.display = '';
            } else {
                rows[i].style.display = 'none';
            }
        }
    });
});
</script>
</body>
</html>
