<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Article;
use App\Models\Fournisseur;
use App\Models\LigneAchat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AchatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $achats=Achat::where('user_id',Auth::id())->orderBy('created_at','desc')->get();
        if(isset($_GET['fr']) && $_GET['fr']!==''){
            $achats=Achat::where('user_id',Auth::id())->where('fournisseur_id',$_GET['fr'])->get();
        }
        return view('main.achats.index',compact('achats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user=User::where('id',Auth::id())->first();
        $fournisseurs=$user->fournisseurs;
        $articles=$user->articles;
        return view('main.achats.create',['fournisseurs'=>$fournisseurs,'articles'=>$articles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $img = time() . '-' . $request->file('file')->getClientOriginalName();
            $request['piece_jointe'] = $img;
            $request->file('file')->move(\public_path('Achats'), $img);
        }
        $uid=Auth::id();
        $request['user_id']=$uid;
        Achat::create($request->post());
        $Aid=Achat::where('user_id',$uid)->latest()->first()->id;
        $produits=json_decode($request->Produits);
        if (count($produits)>0) {
        foreach ($produits as  $pr){
            LigneAchat::create([
                'achat_id'=>$Aid,
                'article_id'=>$pr->id,
                'qte_cmd'=>$pr->QteCmd,
                'qte_recue'=>$pr->QteRecue,
                'price'=>$pr->price
            ]);
            $ar = Article::where('id', $pr->id)->first();
            $ar->quantite = $ar->quantite + $pr->QteRecue;
            $ar->save();
        }
    }

        return response()->json(['message'=>'data inserted successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Achat $achat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Achat $achat)
    {
        return response()->json(['facture'=>$achat]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Achat $achat)
    {
        $achat->fill($request->post())->save();
        return response()->json(['msg'=>$request->post()]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Achat $achat)
    {
        if ($achat!= null && count($achat->lignesA)>0 ){
            LigneAchat::where('achat_id',$achat->id)->delete();
        }
        $achat->delete();
        return to_route('achat.index')->with('success','Achat supprimee');
    }

    public function getListe($id){
        $articles=LigneAchat::where('achat_id',$id)->get();
        foreach($articles as $r){
            $r['libelle']=$r->article->description;
        }
        // dd($articles);
        return response()->json(['articles'=>$articles]);
    }
}
