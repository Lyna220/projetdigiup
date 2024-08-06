<!DOCTYPE html>
<html>
<head>
    <title>Liste des Produits</title>
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
        <h1>Liste des Produits</h1>
        <a href="{{ route('produits.create') }}" class="btn btn-primary">Ajouter un Produit</a>
    </div>

    <!-- Champ de recherche -->
    <input type="text" id="searchInput" class="form-control" placeholder="Rechercher...">

    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Référence</th>
                <th>Désignation</th>
                <th>Catégorie</th>
                <th>Fournisseur</th>
                <th>Qté en stock</th>
                <th>Prix d’achat</th>
                <th>Prix de vente</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="produitTableBody">
            @foreach ($produits as $produit)
                <tr>
                    <td>{{ $produit->id }}</td>
                    <td>{{ $produit->reference }}</td>
                    <td>{{ $produit->designation }}</td>
                    <td>{{ $produit->categorie }}</td>
                    <td>{{ $produit->fournisseur->societe }}</td>
                    <td>{{ $produit->quantite_stock }}</td>
                    <td>{{ $produit->prix_achat }}</td>
                    <td>{{ $produit->prix_vente }}</td>
                    <td class="action-icons">
                        <a href="{{ route('produits.show', $produit->id) }}">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('produits.edit', $produit->id) }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('produits.destroy', $produit->id) }}" method="POST" style="display:inline;">
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
    const tableBody = document.getElementById('produitTableBody');
    
    if (!tableBody) {
        console.error('Element with ID "produitTableBody" not found.');
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
