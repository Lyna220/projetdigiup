<!DOCTYPE html>
<html>
<head>
    <title>Ajouter Stock</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>
<body>

    <div class="container">
        <h1>Créer un nouveau stock</h1>
        <form action="{{ route('stocks.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="produit_id">Référence de produit</label>
                <select class="form-control" id="produit_id" name="produit_id" required>
                    <option value="">Sélectionnez un produit</option>
                    @foreach($produits as $produit)
                        <option value="{{ $produit->id }}" 
                            data-reference="{{ $produit->reference }}" 
                            data-designation="{{ $produit->designation }}" 
                            data-categorie="{{ $produit->categorie }}">
                            {{ $produit->reference }} - {{ $produit->designation }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="reference">Référence</label>
                <input type="text" class="form-control" id="reference" name="reference" readonly>
            </div>
            <div class="form-group">
                <label for="designation">Désignation</label>
                <input type="text" class="form-control" id="designation" name="designation" readonly>
            </div>
            <div class="form-group">
                <label for="categorie">Catégorie</label>
                <input type="text" class="form-control" id="categorie" name="categorie" readonly>
            </div>
            <div class="form-group">
                <label for="stock_min">Stock Minimum</label>
                <input type="number" class="form-control" id="stock_min" name="stock_min" required>
            </div>
            <div class="form-group">
                <label for="stock_max">Stock Maximum</label>
                <input type="number" class="form-control" id="stock_max" name="stock_max" required>
            </div>
            <div class="form-group">
                <label for="stock_reel">Stock Réel</label>
                <input type="number" class="form-control" id="stock_reel" name="stock_reel" required>
            </div>
            <div class="form-group">
                <label for="prix_vente">Prix de Vente</label>
                <input type="number" class="form-control" id="prix_vente" name="prix_vente" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Créer</button>
        </form>
    </div>

    <script>
        document.getElementById('produit_id').addEventListener('change', function () {
            var selectedOption = this.options[this.selectedIndex];
            document.getElementById('reference').value = selectedOption.getAttribute('data-reference');
            document.getElementById('designation').value = selectedOption.getAttribute('data-designation');
            document.getElementById('categorie').value = selectedOption.getAttribute('data-categorie');
        });
    </script>

    <a href="{{ route('stocks.index') }}">Retour à la liste</a>
</body>
</html>
