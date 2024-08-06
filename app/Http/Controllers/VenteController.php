<?php
namespace App\Http\Controllers;

use App\Models\Vente;
use App\Models\Client;
use App\Models\Facture;
use Illuminate\Http\Request;
use App\Models\User; 

class VenteController extends Controller
{
    public function index()
    {
        $ventes = Vente::all();
        return view('ventes.index', compact('ventes'));
    }

    public function create()
    {
        $clients = Client::all();
        $factures = Facture::all();
        return view('ventes.create', compact('clients', 'factures'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero_facture' => 'required|string|max:255',
            'date_facture' => 'required|date',
            'client_id' => 'required|exists:clients,id',
            'status' => 'required|string|max:20',
            'total' => 'required|numeric',
            'remise' => 'nullable|numeric',
            'avance' => 'nullable|numeric',
            'reste_a_payer' => 'nullable|numeric',
            'responsable' => 'required|string|max:255',
        ]);
    
        Vente::create($request->all());
        return redirect()->route('ventes.index')->with('success', 'Vente créée avec succès.');
    }
    

    public function show(Vente $vente)
    {
        return view('ventes.show', compact('vente'));
    }

    public function edit(Vente $vente)
    {
        $clients = Client::all();
        $factures = Facture::all();
        return view('ventes.edit', compact('vente', 'clients', 'factures'));
    }

    public function update(Request $request, Vente $vente)
    {
        $request->validate([
            'numero_facture' => 'required|string|max:255',
            'date_facture' => 'required|date',
            'client_id' => 'required|exists:clients,id',
            'status' => 'required|string|max:20',
            'total' => 'required|numeric',
            'remise' => 'nullable|numeric',
            'avance' => 'nullable|numeric',
            'reste_a_payer' => 'nullable|numeric',
        ]);

        $vente->update($request->all());
        return redirect()->route('ventes.index')->with('success', 'Vente mise à jour avec succès.');
    }

    public function destroy(Vente $vente)
    {
        $vente->delete();
        return redirect()->route('ventes.index')->with('success', 'Vente supprimée avec succès.');
    }
}
