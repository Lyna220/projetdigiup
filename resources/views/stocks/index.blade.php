<!DOCTYPE html>
<html>
<head>
    <title>Liste des Stocks</title>
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
        <h1>Liste des Stocks</h1>
        <a href="{{ route('stocks.create') }}" class="btn btn-primary">Ajouter</a>
    </div>

    <!-- Champ de recherche -->
    <input type="text" id="searchInput" class="form-control" placeholder="Rechercher...">

    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>Référence</th>
                <th>Désignation</th>
                <th>Catégorie</th>
                <th>Stock Min</th>
                <th>Stock Max</th>
                <th>Stock Réel</th>
                <th>Prix de Vente</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="stockTableBody">
            @foreach($stocks as $stock)
                <tr>
                    <td>{{ $stock->produit->reference ?? 'Non défini' }}</td>
                    <td>{{ $stock->produit->designation ?? 'Non défini' }}</td>
                    <td>{{ $stock->produit->categorie ?? 'Non défini' }}</td>
                    <td>{{ $stock->stock_min }}</td>
                    <td>{{ $stock->stock_max }}</td>
                    <td>{{ $stock->stock_reel }}</td>
                    <td>{{ $stock->prix_vente }}</td>
                    <td class="action-icons">
                         <a href="{{ route('stocks.show', $stock->id) }}">
                            <i class="fas fa-eye"></i>
                         </a>
                         <a href="{{ route('stocks.edit', $stock->id) }}">
                            <i class="fas fa-edit"></i>
                         </a>
                         <form action="{{ route('stocks.destroy', $stock->id) }}" method="POST" style="display:inline;">
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
    <a href="{{ route('home') }}" class="btn btn-secondary mt-3">Retour à l'accueil</a>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const tableBody = document.getElementById('stockTableBody');
    
    if (!tableBody) {
        console.error('Element with ID "stockTableBody" not found.');
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
