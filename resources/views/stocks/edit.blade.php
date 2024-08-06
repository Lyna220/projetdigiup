<!DOCTYPE html>
<html>
<head>
    <title>Modifier Stock</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<body>
<div class="container">
        <h1>Modifier le stock</h1>
        <form action="{{ route('stocks.update', $stock->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="produit_id">Référence du produit</label>
                <select class="form-control" id="produit_id" name="produit_id" required>
                    @foreach($produits as $produit)
                        <option value="{{ $produit->id }}" {{ $produit->id == $stock->produit_id ? 'selected' : '' }}>
                            {{ $produit->reference }} - {{ $produit->designation }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="stock_min">Stock Minimum</label>
                <input type="number" class="form-control" id="stock_min" name="stock_min" value="{{ $stock->stock_min }}" required>
            </div>
            <div class="form-group">
                <label for="stock_max">Stock Maximum</label>
                <input type="number" class="form-control" id="stock_max" name="stock_max" value="{{ $stock->stock_max }}" required>
            </div>
            <div class="form-group">
                <label for="stock_reel">Stock Réel</label>
                <input type="number" class="form-control" id="stock_reel" name="stock_reel" value="{{ $stock->stock_reel }}" required>
            </div>
            <div class="form-group">
                <label for="prix_vente">Prix de Vente</label>
                <input type="number" class="form-control" id="prix_vente" name="prix_vente" value="{{ $stock->prix_vente }}" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    <a href="{{ route('stocks.index') }}"><i class="fa-solid fa-arrow-left"></i>
    </a>
</body>
</div>

</html>
