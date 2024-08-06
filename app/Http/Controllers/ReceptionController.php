<?php
namespace App\Http\Controllers;

use App\Models\Reception;
use App\Models\Fournisseur;
use App\Models\Produit;
use Illuminate\Http\Request;

class ReceptionController extends Controller
{
    public function index()
    {
        $receptions = Reception::all();
        return view('receptions.index', compact('receptions'));
    }

    public function create()
    {
        $fournisseurs = Fournisseur::all();
        $produits = Produit::all();
        return view('receptions.create', compact('fournisseurs', 'produits'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date_reception' => 'required|date',
            'fournisseur_id' => 'required|exists:fournisseurs,id',
            'produit_id' => 'required|exists:produits,id',
            'quantite' => 'required|integer',
            'reference' => 'required|string|max:255',
            'responsable' => 'required|string|max:255', // Ajouter validation pour responsable
        ]);

        Reception::create($request->all());
        return redirect()->route('receptions.index')->with('success', 'Réception créée avec succès.');
    }

    public function show(Reception $reception)
    {
        return view('receptions.show', compact('reception'));
    }

    public function edit(Reception $reception)
    {
        $fournisseurs = Fournisseur::all();
        $produits = Produit::all();
        return view('receptions.edit', compact('reception', 'fournisseurs', 'produits'));
    }

    public function update(Request $request, Reception $reception)
    { 
        $request->validate([
            'date_reception' => 'required|date',
            'fournisseur_id' => 'required|exists:fournisseurs,id',
            'produit_id' => 'required|exists:produits,id',
            'quantite' => 'required|integer',
            'reference' => 'required|string|max:255',
            'responsable' => 'required|string|max:255', // Ajouter validation pour responsable
        ]);

        $reception->update($request->only([
            'date_reception',
            'fournisseur_id' ,
            'produit_id' ,
            'quantite' ,
            'reference',
            'responsable'
        ]));        
        return redirect()->route('receptions.index')->with('success', 'Réception mise à jour avec succès.');
    }

    public function destroy(Reception $reception)
    {
        $reception->delete();
        return redirect()->route('receptions.index')->with('success', 'Réception supprimée avec succès.');
    }
}
