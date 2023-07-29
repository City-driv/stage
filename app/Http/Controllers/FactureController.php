<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Facture;
use App\Models\Ligne_facture;
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
        return view('main.factures.factures');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function forme(){
        return view('main.factures.facture-type');
    }
    public function forme_bl(){
        return view('main.livraison.livraison-type');
    }
    public function forme_bc(){
        return view('main.bon-cmd.bon-cmd-type');
    }
    public function forme_b(){
        return view('main.bon.bon-type');
    }
    public function forme_fv(){
        return view('main.facture-d-avoir.facture-d-avoir-type');
    }

    public function create()
    {
        
        $user=User::where('id',Auth::id())->first();
        $clients=$user->clients;
        $articles=$user->articles;
        // dd($clients);
        if (isset($_GET['t']) && isset($_GET['Ex'])) {
            // dump($_GET['t'] . '__'.$_GET['Ex']);
            $type=$_GET['t'];
            $exemple=$_GET['Ex'];
            return view('main.factures.create',['clients'=>$clients,'articles'=>$articles,'t'=>$type,'ex'=>$exemple]);
        }
        return view('main.factures.create',['clients'=>$clients,'articles'=>$articles,'t'=>'F','ex'=>'1']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        Facture::create([
            'ref'=>$request->ref,
            'client_id'=>$request->client,
            'user_id'=>Auth::id(),
            'date_facture'=>date("Y/m/d"),
            'type_fact'=>$request->type,
            'ttc'=>$request->ttc,
            'tht'=>$request->tht,
            'ttva'=>$request->ttva
        ]);
        $fact_id=Facture::latest()->first()->id;
        $produits=$request->Produits;
        foreach ($produits as $pr) {
            Ligne_facture::create([
                'facture_id'=>$fact_id,
                'article_id' => $pr['id'],
                'quantite'=>$pr['Qtee'],
                'remise'=>$pr['remise'],
                'tva'=>$pr['tva']
            ]);
        }

        return response()->json(['message' => $request->user,'ref'=>$request->ref,'client'=>$request->client]);
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
