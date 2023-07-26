<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Facture;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function forme(){
        return view('main.factures.facture-type');
    }

    public function create()
    {
        
        $user=User::where('id',Auth::id())->first();
        $clients=$user->clients;
        $articles=$user->articles;
        // dd($clients);
        if (isset($_GET['fact_type'])) {
            dump($_GET['fact_type']);
            dd($_GET['ex']);
        }
        return view('main.factures.create',['clients'=>$clients,'articles'=>$articles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Facture $facture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Facture $facture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Facture $facture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facture $facture)
    {
        //
    }
    public function test(){
        $produits=Article::all();
        return view('main.factures.test',compact('produits'));
    }
}
