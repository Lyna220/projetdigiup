<?php
namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'genre' => 'required|string|max:10',
            'cine' => 'required|string|max:20',
            'adresse' => 'required|string|max:255',
            'premiere_visite' => 'nullable|date',
            'derniere_visite' => 'nullable|date',
            'client_depuis' => 'nullable|date',
            'total_vente' => 'nullable|numeric',
            'total_reglement' => 'nullable|numeric',
            'reste_du' => 'nullable|numeric',
            'nombre_visite' => 'nullable|integer',
            'assurance' => 'nullable|string|max:10',
        ]);

        Client::create($request->all());
        return redirect()->route('clients.index')->with('success', 'Client créé avec succès.');
    }

    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'genre' => 'required|string|max:10',
            'cine' => 'required|string|max:20',
            'adresse' => 'required|string|max:255',
            'premiere_visite' => 'nullable|date',
            'derniere_visite' => 'nullable|date',
            'client_depuis' => 'nullable|date',
            'total_vente' => 'nullable|numeric',
            'total_reglement' => 'nullable|numeric',
            'reste_du' => 'nullable|numeric',
            'nombre_visite' => 'nullable|integer',
            'assurance' => 'nullable|string|max:10',
        ]);

        $client->update($request->all());
        return redirect()->route('clients.index')->with('success', 'Client mis à jour avec succès.');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Client supprimé avec succès.');
    }
}
