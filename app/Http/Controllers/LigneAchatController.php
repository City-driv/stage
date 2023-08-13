<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\LigneAchat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LigneAchatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (isset($_GET['date1']) && $_GET['date2']!=='') {
            $Achats=Achat::select('id','remiseGlobal','total')->where('user_id',Auth::id())->when($_GET['date1'], function ($query){
                return $query->whereBetween('date', [$_GET['date1'], $_GET['date2']]);
            })->get();;
        }else {
            $Achats=Achat::select('id','remiseGlobal','total')->where('user_id',Auth::id())->get();
        }
        if (isset($_GET['type']) && $_GET['type']=='f') {
            if (isset($_GET['date1']) && $_GET['date2']!=='') {
                $Achats=Achat::select('id','remiseGlobal','total')->where('user_id',Auth::id())->where('type','Facture')->when($_GET['date1'], function ($query){
                    return $query->whereBetween('date', [$_GET['date1'], $_GET['date2']]);
                })->get();;
            }else {
                $Achats=Achat::select('id','remiseGlobal','total')->where('user_id',Auth::id())->where('type','Facture')->get();
            }
        }
        $achatIds = $Achats->pluck('id'); // Extract IDs from the collection
        $TOTAL=$Achats->sum('total');
        $REMISE=$Achats->sum('remiseGlobal');
        $ligne_achat=LigneAchat::whereIn('achat_id',$achatIds)->get();
        return view('main.factures.mvEntre',compact('ligne_achat','TOTAL','REMISE'));
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
    public function show(LigneAchat $ligneAchat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LigneAchat $ligneAchat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LigneAchat $ligneAchat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LigneAchat $ligneAchat)
    {
        //
    }
}
