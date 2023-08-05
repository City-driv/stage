<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Client;
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
        if(isset($_GET['type'])){
            $type=$_GET['type'];
            if ($type=='f') {
                $t='Factures';
                $factures=Facture::where('user_id',Auth::id())->where('type_fact','facture')->get();
            }elseif($type=='bl') {
                $t='Bons Livraison';
                $factures=Facture::where('user_id',Auth::id())->where('type_fact','bon_livraison')->get();
            }elseif($type=='bc'){
                $t='Bons de Commandes';
                $factures=Facture::where('user_id',Auth::id())->where('type_fact','bon_cmd')->get();
            }elseif ($type=='fv') {
                $t="Factures d'Avoirs";
                $factures=Facture::where('user_id',Auth::id())->where('type_fact','facture_d_avoir')->get();
            }elseif ($type=='b') {
                $t='Bons';
                $factures=Facture::where('user_id',Auth::id())->where('type_fact','bon')->get();
            }elseif ($type=='dv') {
                $t='Devis';
                $factures=Facture::where('user_id',Auth::id())->where('type_fact','devis')->get();
            }elseif ($type=='fp') {
                $t='Factures Proforma';
                $factures=Facture::where('user_id',Auth::id())->where('type_fact','facture_proforma')->get();
            }
        }else{
            $factures=Facture::where('user_id',Auth::id())->get();
            $t='Factures';
        }
        $TTC=$factures->sum('ttc');
        $TTVA=$factures->sum('ttva');
        $THT=$factures->sum('tht');
        return view('main.factures.factures',compact('factures','TTC','TTVA','THT','t'));
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
    public function forme_d(){
        return view('main.devis.devis');
    }
    public function forme_p(){
        return view('main.facture-proforma.facture-proforma');
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
        $uId=Auth::id();
        Facture::create([
            'ref'=>$request->ref,
            'client_id'=>$request->client,
            'user_id'=>$uId,
            'date_facture'=>date("Y/m/d"),
            'type_fact'=>$request->type,
            'ttc'=>$request->ttc,
            'tht'=>$request->tht,
            'ttva'=>$request->ttva,
            'exemple'=>'ex'.$request->ex,
            'mode_paiement'=>$request->mode_paiement
        ]);
        $fact_id=Facture::where('user_id',$uId)->latest()->first()->id;
        $produits=$request->Produits;
        foreach ($produits as $pr) {
            Ligne_facture::create([
                'facture_id'=>$fact_id,
                'article_id' => $pr['id'],
                'quantite'=>$pr['Qtee'],
                'remise'=>$pr['remise'],
                'tva'=>$pr['tva'],
                'ttc'=>$pr['TTc'],
            ]);
        }

        return response()->json(['message' => $request->user,'ref'=>$request->ref,'client'=>$request->client,'fact'=>$fact_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Facture $facture)
    {
        $ex=$facture->exemple;
        // dump($ex);
        $Ligne_fact=Ligne_facture::where('facture_id',$facture->id)->get();
        return view('main.docsFactures.'.$ex,compact('facture','Ligne_fact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Facture $facture)
    {
        // dd($facture->lignes);
        $user=User::where('id',Auth::id())->first();
        $clients=$user->clients;
        $articles=$user->articles;
        $liste=[];
        foreach ($facture->lignes as $lg) {
            // $liste+=$lg->concat($lg->article);
            // $lg+=$lg->article;
            // $liste->concat($lg);
            // $x=$lg+ $lg->article;
            $lg->art=$lg->article;
            // dump($lg);
            array_push($liste,$lg);
        }
        ;
        // dd($liste);
        $jsonData=['articlesJ'=>$liste];
        return view('main.factures.edit',['clients'=>$clients,'articles'=>$articles,'facture'=>$facture,'jsonData'=>$jsonData]);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Facture $facture)
    {
        $fid=$facture->id;

        $facture->update([
            'client_id'=>$request->client,
            'ttc'=>$request->ttc,
            'tht'=>$request->tht,
            'ttva'=>$request->ttva,
            'mode_paiement'=>$request->mode_paiement
        ]);


        Ligne_facture::where('facture_id',$facture->id)->delete(); 
        $produits=$request->Produits;
        foreach ($produits as $pr) {
            Ligne_facture::create([
                'facture_id'=>$fid,
                'article_id' => $pr['id'],
                'quantite'=>$pr['Qtee'],
                'remise'=>$pr['remise'],
                'tva'=>$pr['tva'],
                'ttc'=>$pr['TTc'],
            ]);
        }
        return response()->json(['request'=>$request->Produits,'facture'=>$request->post(),'fid'=>$fid]);
        // return response()->json(['msg'=>'edit msg']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facture $facture)
    {
        // dd($facture);
        Ligne_facture::where('facture_id',$facture->id)->delete(); 
        $facture->delete();
        return to_route('all.factures')->with('success','Facture supprimee');
    }


    public function test(){
        $produits=Article::all();
        return view('main.factures.test',compact('produits'));
    }

}
