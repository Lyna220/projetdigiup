<!DOCTYPE html>
<html>
<head>
    <title>Liste des Ventes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        #searchInput {
            margin-bottom: 20px;
            padding: 10px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
        }

        .btn-group .btn {
            margin-right: 5px;
        }
        .action-icons a, .action-icons form {
    display: inline-block;
    margin-right: 5px;
}
.action-icons i {
    color: #3498db;
    font-size: 1.2em;
    cursor: pointer;
}
.action-icons .delete-icon {
    color: red;
}
.action-icons a, .action-icons button {
    background: none;
    border: none;
    padding: 0;
}

    </style>
</head>
<body>
@include('layouts.layout')

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Liste des Ventes</h1>
        <a href="{{ route('ventes.create') }}" class="btn btn-primary">Ajouter une Vente</a>
    </div>
    
    <!-- Champ de recherche -->
    <input type="text" id="searchInput" class="form-control" placeholder="Rechercher...">

    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>N° Facture</th>
                <th>Date de Facture</th>
                <th>Client</th>
                <th>Status</th>
                <th>Total</th>
                <th>Remise</th>
                <th>Avance</th>
                <th>Reste à Payer</th>
                <th>Responsable</th>
                <th>Actions</th>
            </tr>
        </thead>
        @if ($ventes->isEmpty())
        <p class="no-data">Aucune vente trouvée.</p>
        @else
        <tbody id="ventesTableBody">
            @foreach ($ventes as $vente)
                <tr>
                    <td>{{ $vente->id }}</td>
                    <td>{{ $vente->numero_facture }}</td>
                    <td>{{ $vente->date_facture }}</td>
                    <td>{{ $vente->client->nom }} {{ $vente->client->prenom }}</td>
                    <td>{{ $vente->status }}</td>
                    <td>{{ $vente->total }} DH</td>
                    <td>{{ $vente->remise }} DH</td>
                    <td>{{ $vente->avance }} DH</td>
                    <td>{{ $vente->reste_a_payer }} DH</td>
                    <td>{{ $vente->responsable }}</td>
                    <td class="action-icons">
                          <a href="{{ route('ventes.show', $vente->id) }}">
                         <i class="fas fa-eye"></i>
                         </a>
                       <a href="{{ route('ventes.edit', $vente->id) }}">
                       <i class="fas fa-edit"></i>
                       </a>
                     <form action="{{ route('ventes.destroy', $vente->id) }}" method="POST" style="display:inline;">
                       @csrf
                       @method('DELETE')
                    <button type="submit">
                        <i class="fas fa-trash-alt delete-icon"></i>
                        </button>
                       </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
        @endif
    </table>
    <a href="{{ route('home') }}" class="btn btn-secondary mt-3">Retour à l'accueil</a>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const tableBody = document.getElementById('ventesTableBody');
    
    if (!tableBody) {
        console.error('Element with ID "ventesTableBody" not found.');
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
