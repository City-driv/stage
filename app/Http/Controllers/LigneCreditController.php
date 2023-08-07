<?php

namespace App\Http\Controllers;

use App\Models\Credit;
use App\Models\Ligne_credit;
use Illuminate\Http\Request;

class LigneCreditController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $idC=$request->Id;
        Ligne_credit::create($request->post());
        $cr=Credit::where('id',$request->credit_id)->first();
        $cr->p_reste=$cr->p_reste - $request->montant;
        $cr->save();
        return response()->json(['message'=>$request->post()]);
    }
    public function getLignes($creditId){
        $result = Ligne_credit::where('credit_id',$creditId)->get();
        return response()->json(['payments'=>$result]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ligne_credit $ligne_credit)
    {
        return view('main.credits.recu',['payement'=>$ligne_credit]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ligne_credit $ligne_credit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ligne_credit $ligne_credit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ligne_credit $ligne_credit)
    {
        //
    }
}
