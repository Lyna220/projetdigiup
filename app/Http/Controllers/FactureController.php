<?php
namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Client;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    public function index()
    {
        $factures = Facture::all();
        return view('factures.index', compact('factures'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('factures.create', compact('clients'));
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

        Facture::create($request->all());
        return redirect()->route('factures.index')->with('success', 'Facture créée avec succès.');
    }

    public function show(Facture $facture)
    {
        return view('factures.show', compact('facture'));
    }

    public function edit(Facture $facture)
    {
        $clients = Client::all();
        return view('factures.edit', compact('facture', 'clients'));
    }

    public function update(Request $request, Facture $facture)
{
   
    $validated = $request->validate([
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

    
    $facture->update($request->only([
        'numero_facture',
        'date_facture',
        'client_id',
        'status',
        'total',
        'remise',
        'avance',
        'reste_a_payer',
        'responsable'
    ]));

    return redirect()->route('factures.index')->with('success', 'Facture mise à jour avec succès.');
}


    public function destroy(Facture $facture)
    {
        $facture->delete();
        return redirect()->route('factures.index')->with('success', 'Facture supprimée avec succès.');
    }
}
