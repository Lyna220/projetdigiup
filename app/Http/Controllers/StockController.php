<?php
namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Produit;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::with('produit')->get();
        return view('stocks.index', compact('stocks'));
    }

    public function create()
    {
        $produits = Produit::all();
        return view('stocks.create', compact('produits'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'stock_min' => 'required|integer',
            'stock_max' => 'required|integer',
            'stock_reel' => 'required|integer',
            'prix_vente' => 'required|numeric',
        ]);

        Stock::create($request->all());
        return redirect()->route('stocks.index')->with('success', 'Stock créé avec succès.');
    }

    public function show(Stock $stock)
    {
        $stock->load('produit');
        return view('stocks.show', compact('stock'));
    }

    public function edit(Stock $stock)
    {
        $produits = Produit::all();
        return view('stocks.edit', compact('stock', 'produits'));
    }

    public function update(Request $request, Stock $stock)
    {
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'stock_min' => 'required|integer',
            'stock_max' => 'required|integer',
            'stock_reel' => 'required|integer',
            'prix_vente' => 'required|numeric',
        ]);

        $stock->update($request->all());
        return redirect()->route('stocks.index')->with('success', 'Stock mis à jour avec succès.');
    }

    public function destroy(Stock $stock)
    {
        $stock->delete();
        return redirect()->route('stocks.index')->with('success', 'Stock supprimé avec succès.');
    }
}
