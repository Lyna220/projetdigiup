<!DOCTYPE html>
<html>
<head>
    <title>Liste des Caisses</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .filter-form {
            margin-bottom: 20px;
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
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Liste des Caisses</h1>
        <a href="{{ route('caisses.create') }}" class="btn btn-primary">Ajouter un Enregistrement</a>
    </div>

    <!-- Formulaire de filtre par date -->
    <form action="{{ route('caisses.index') }}" method="GET" class="filter-form">
        <h2>Filtrer par date:</h2>
        <div class="form-group">
            <label for="start_date">Date de début:</label>
            <input type="date" name="start_date" id="start_date" class="form-control">
        </div>
        <div class="form-group">
            <label for="end_date">Date de fin:</label>
            <input type="date" name="end_date" id="end_date" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Filtrer</button>
    </form>

    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date de Facture</th>
                <th>Status</th>
                <th>Client</th>
                <th>Paiement</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($caisses as $caisse)
                <tr>
                    <td>{{ $caisse->id }}</td>
                    <td>{{ $caisse->date_facture }}</td>
                    <td>{{ $caisse->status }}</td>
                    <td>{{ $caisse->client->nom }} {{ $caisse->client->prenom }}</td>
                    <td>{{ $caisse->paiement }}</td>
                    <td class="action-icons">
                     <a href="{{ route('caisses.show', $caisse->id) }}">
                    <i class="fas fa-eye"></i>
                     </a>
                  <a href="{{ route('caisses.edit', $caisse->id) }}">
                  <i class="fas fa-edit"></i>
                 </a>
               <form action="{{ route('caisses.destroy', $caisse->id) }}" method="POST" style="display:inline;">
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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
