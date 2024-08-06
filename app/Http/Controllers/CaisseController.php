<?php
namespace App\Http\Controllers;

use App\Models\Caisse;
use App\Models\Facture;
use App\Models\Client;
use Illuminate\Http\Request;

class CaisseController extends Controller
{
    public function index(Request $request)
{
    // Créez une requête de base pour les caisses
    $query = Caisse::query();

    // Vérifiez si des dates de début et de fin sont spécifiées
    if ($request->has('start_date') && $request->has('end_date')) {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        
        // Vérifiez si les dates sont valides et appliquez le filtrage
        if (strtotime($start_date) && strtotime($end_date)) {
            $query->whereBetween('date_facture', [$start_date, $end_date]);
        }
    }

    // Récupérez les caisses selon la requête
    $caisses = $query->get();

    return view('caisses.index', compact('caisses'));
}

    
 
    public function create()
    {
        $factures = Facture::all();
        $clients = Client::all();
        return view('caisses.create', compact('factures', 'clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'facture_id' => 'required|exists:factures,id',
            'date_facture' => 'required|date',
            'status' => 'required|string|max:20',
            'client_id' => 'required|exists:clients,id',
            'paiement' => 'required|numeric',
        ]);

        Caisse::create($request->all());
        return redirect()->route('caisses.index')->with('success', 'Caisse créée avec succès.');
    }

    public function show(Caisse $caisse,$id)
    {
        $caisse = Caisse::findOrFail($id);

        return view('caisses.show', compact('caisse'));
    }

    public function edit(Caisse $caisse,$id)
    {
        $caiss = Caisse::findOrFail($id);

        $factures = Facture::all();
        $clients = Client::all();
        return view('caisses.edit', compact('caiss', 'factures', 'clients'));
    }

    public function update(Request $request, Caisse $caisse)
    {
        $request->validate([
            'facture_id' => 'required|exists:factures,id',
            'date_facture' => 'required|date',
            'status' => 'required|string|max:20',
            'client_id' => 'required|exists:clients,id',
            'paiement' => 'required|numeric',
        ]);

        $caisse->update($request->only([
           'facture_id',
            'date_facture' ,
            'status',
            'client_id' ,
            'paiement'
        ]));

        return redirect()->route('caisses.index')->with('success', 'Caisse mise à jour avec succès.');
    }

    public function destroy(Caisse $caisse)
    {
        $caisse->delete();
        return redirect()->route('caisses.index')->with('success', 'Caisse supprimée avec succès.');
    }
}
