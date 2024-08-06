<?php
namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Fournisseur;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::all();
        return view('produits.index', compact('produits'));
    }

    public function create()
    {
        $fournisseurs = Fournisseur::all();
        return view('produits.create', compact('fournisseurs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'reference' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'categorie' => 'required|string|max:255',
            'fournisseur_id' => 'required|exists:fournisseurs,id',
            'quantite_stock' => 'required|integer',
            'prix_achat' => 'required|numeric',
            'prix_vente' => 'required|numeric',
        ]);

        Produit::create($request->all());
        return redirect()->route('produits.index')->with('success', 'Produit créé avec succès.');
    }

    public function show(Produit $produit)
    {
        return view('produits.show', compact('produit'));
    }

    public function edit(Produit $produit)
    {
        $fournisseurs = Fournisseur::all();
        return view('produits.edit', compact('produit', 'fournisseurs'));
    }

    public function update(Request $request, Produit $produit)
    {
        $request->validate([
            'reference' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'categorie' => 'required|string|max:255',
            'fournisseur_id' => 'required|exists:fournisseurs,id',
            'quantite_stock' => 'required|integer',
            'prix_achat' => 'required|numeric',
            'prix_vente' => 'required|numeric',
        ]);

        $produit->update($request->all());
        return redirect()->route('produits.index')->with('success', 'Produit mis à jour avec succès.');
    }

    public function destroy(Produit $produit)
    {
        $produit->delete();
        return redirect()->route('produits.index')->with('success', 'Produit supprimé avec succès.');
    }
}
