<!DOCTYPE html>
<html>
<head>
    <title>Liste des Clients</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        #searchInput {
            margin-bottom: 20px;
            padding: 10px;
            font-size: 16px;
            width: 100%;
            max-width: 400px;
        }
        .action-buttons {
            display: flex;
            gap: 5px;
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
    <h1 class="mb-4">Liste des Clients</h1>
    <a href="{{ route('clients.create') }}" class="btn btn-primary mb-3">Ajouter un Client</a>

    <!-- Champ de recherche -->
    <input type="text" id="searchInput" class="form-control" placeholder="Rechercher par nom, prénom, téléphone, ou adresse">

    <table class="table table-striped mt-3">
        <thead >
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Téléphone</th>
                <th>Adresse</th>
                <th>Genre</th>
                <th>CIN</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="clientTableBody">
            @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->nom }}</td>
                    <td>{{ $client->prenom }}</td>
                    <td>{{ $client->telephone }}</td>
                    <td>{{ $client->adresse }}</td>
                    <td>{{ $client->genre }}</td>
                    <td>{{ $client->cine }}</td>
                    <td class="action-icons">
                         <a href="{{ route('clients.show', $client->id) }}">
                         <i class="fas fa-eye"></i>
                     </a>
                     <a href="{{ route('clients.edit', $client->id) }}">
                         <i class="fas fa-edit"></i>
                     </a>
                     <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline;">
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
    </table>
    <a href="{{ route('home') }}" class="btn btn-secondary">Retour à l'accueil</a>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const tableBody = document.getElementById('clientTableBody');
        
        if (!tableBody) {
            console.error('Element with ID "clientTableBody" not found.');
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
