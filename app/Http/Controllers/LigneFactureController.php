<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Ligne_facture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LigneFactureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (isset($_GET['date1']) && $_GET['date2']!=='' ) {
            // dd('la date kaayna');
            $factures=Facture::select('id','ttc','ttva','tht')->where('user_id',Auth::id())->whereIn('type_fact',['facture','bon_livraison','bon_cmd','bon',])->when($_GET['date1'], function ($query) {
                return $query->whereBetween('date_facture', [$_GET['date1'], $_GET['date2']]);
            })->get();;

        }else {
            $factures=Facture::select('id','ttc','ttva','tht')->where('user_id',Auth::id())->whereIn('type_fact',['facture','bon_livraison','bon_cmd','bon',])->get();
        }
        if (isset($_GET['type']) && $_GET['type']=='f') {
            if (isset($_GET['date1']) && $_GET['date2']!=='' ) {
                // dd('la date kaayna');
                $factures=Facture::select('id','ttc','ttva','tht')->where('user_id',Auth::id())->where('type_fact','facture')->when($_GET['date1'], function ($query) {
                    return $query->whereBetween('date_facture', [$_GET['date1'], $_GET['date2']]);
                })->get();;
    
            }else {
                $factures=Facture::select('id','ttc','ttva','tht')->where('user_id',Auth::id())->where('type_fact','facture')->get();
            } 
        }
        $factureIds = $factures->pluck('id'); // Extract IDs from the collection
        $TTC=$factures->sum('ttc');
        $TTVA=$factures->sum('ttva');
        $THT=$factures->sum('tht');
        $ligne_facture=Ligne_facture::whereIn('facture_id',$factureIds)->get();
        return view('main.factures.mvSortie',compact('ligne_facture','TTC','TTVA','THT'));
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
    public function show(Ligne_facture $ligne_facture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ligne_facture $ligne_facture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ligne_facture $ligne_facture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ligne_facture $ligne_facture)
    {
        //
    }
}
