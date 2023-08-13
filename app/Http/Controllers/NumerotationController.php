<?php

namespace App\Http\Controllers;

use App\Models\Numerotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NumerotationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $uid=Auth::id();
        $num=Numerotation::where('user_id',$uid)->first();
        // dd($num);
        return view('auth.numerotation',compact('num'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Numerotation $numerotation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Numerotation $numerotation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Numerotation $numerotation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Numerotation $numerotation)
    {
        //
    }
}
