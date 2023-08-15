<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Credit;
use App\Models\Ligne_credit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $credits = Credit::where('user_id', Auth::id())->get();
        return view('main.credits.index', compact('credits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::where('id', Auth::id())->first();
        $clients = $user->clients;
        return view('main.credits.create', compact('clients'));
    }

    public function getFacturesByClient($clientId)
    {
        // Récupérer les articles correspondants au client sélectionné
        $client = Client::findOrFail($clientId);
        $factures = $client->factures;
        return response()->json(['factures' => $factures]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
            'p_marchandise' => 'required',
            'ref' => 'required',
            'motif' => 'required',
            'date_credit' => 'required'
        ], [
            'client_id.required' => 'Veuillez choisir un client', 'p_marchandise.required' => 'Prix marchandise obligatoire',
            'ref.required' => 'Veuillez choisir un Ref', 'motif.required' => 'Veuillez entrer un motif', 'date_credit.required' => 'Date credit obligatoire'
        ]);
        // dd($request->post());
        if ($request->hasFile('piece_jointe')) {
            $pc = time() . '-' . $request->file('piece_jointe')->getClientOriginalName();
            $request['piece_jointe'] = $pc;
            $request->file('piece_jointe')->move(\public_path('piece_jointe'), $pc);
        }
        $request['user_id'] = Auth::id();
        $request['ref'] = $request->ref;
        Credit::create($request->post());
        $crId = Credit::where('user_id', $request->user_id)->latest()->first()->id;

        Ligne_credit::create([
            'credit_id' => $crId,
            'montant' => $request->p_avance,
            'date' => $request->date_credit,
            'observation' => $request->observation,
            'mode_paiement' => $request->mode_paiment
        ]);
        return to_route('credit.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Credit $credit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Credit $credit)
    {
        return response()->json(['credit' => $credit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Credit $credit)
    {
        $credit->fill($request->post())->save();
        return to_route('credit.index')->with('success', 'credit modifiee');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Credit $credit)
    {
        Ligne_credit::where('credit_id', $credit->id)->delete();
        $credit->delete();
        return to_route('credit.index')->with('success', 'credit supprimee');
    }

    public function liste()
    {
        $credits = Credit::where('user_id', Auth::id())->where('p_reste', '>', 0)->get();
        return view('main.credits.liste', compact('credits'));
    }
    
}
