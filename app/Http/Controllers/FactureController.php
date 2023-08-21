<?php

namespace App\Http\Controllers;

use App\Exports\FacturesExport;
use App\Mail\InvoiceEmail;
use App\Models\Article;
use App\Models\Client;
use App\Models\Facture;
use App\Models\Ligne_facture;
use App\Models\Numerotation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use NumberToWords\NumberToWords;
class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $startDate = null;
        $endDate = null;

        if (isset($_GET['date1']) && isset($_GET['date2'])) {
            $startDate = $_GET['date1'];
            $endDate = $_GET['date2'];
            // dd($request->post());
        }

        if (isset($_GET['excel'])) {
            $userId = Auth::id();
            $invoiceType = $_GET['type'];
            if (isset($_GET['trimestre']) && $_GET['trimestre'] !== '') {
                $tr = intval($_GET['trimestre']); // Convert to integer
                $year = date('Y');
                $startDate = date('Y-m-d', strtotime($year . '-01-01 +' . (($tr - 1) * 3) . ' months'));
                $endDate = date('Y-m-d', strtotime($year . '-01-01 +' . ($tr * 3) . ' months -1 day'));
            }
            // dd($_GET['type'] . ' // ' . $userId);
            return Excel::download(new FacturesExport($userId, $invoiceType, $startDate, $endDate), 'invoice.xlsx');
            // return Excel::download(new FacturesExport ($userId, $invoiceType), 'invoices.xlsx');
        }
        $x = null;
        if (isset($_GET['date1'])) {
            $x = $_GET['type'];
            $t = $x;
            // dd($_GET['date1']);
        }
        if (isset($_GET['type']) && $_GET['type'] !== '') {
            $type = $_GET['type'];
            if ($type == 'f') {
                $t = 'Factures';
                $x = 'facture';
            } elseif ($type == 'bl') {
                $t = 'Bons Livraison';
                $x = 'bon_livraison';
            } elseif ($type == 'bc') {
                $t = 'Bons de Commandes';
                $x = 'bon_cmd';
            } elseif ($type == 'fv') {
                $t = "Factures d'Avoirs";
                $x = 'facture_d_avoir';;
            } elseif ($type == 'b') {
                $t = 'Bons';
                $x = 'bon';
            } elseif ($type == 'dv') {
                $t = 'Devis';
                $x = 'devis';
            } elseif ($type == 'fp') {
                $t = 'Factures Proforma';
                $x = 'facture_proforma';
            }
        } else {
            $factures = Facture::where('user_id', Auth::id())->get();
            $t = 'Factures';
            $x = null;
        }

        if ($x == null) {
            $factures = Facture::where('user_id', Auth::id())->orderBy('created_at','desc')
                ->when($startDate, function ($query) use ($startDate, $endDate) {
                    return $query->whereBetween('date_facture', [$startDate, $endDate]);
                })->get();
        } else {
            $factures = Facture::where('user_id', Auth::id())->where('type_fact', $x)->orderBy('created_at','desc')
                ->when($startDate, function ($query) use ($startDate, $endDate) {
                    return $query->whereBetween('date_facture', [$startDate, $endDate]);
                })->get();
        }

        if (isset($_GET['trimestre']) && $_GET['trimestre'] !== '') {
            $tr = intval($_GET['trimestre']); // Convert to integer
            $year = date('Y');
            $start_date = date('Y-m-d', strtotime($year . '-01-01 +' . (($tr - 1) * 3) . ' months'));
            $end_date = date('Y-m-d', strtotime($year . '-01-01 +' . ($tr * 3) . ' months -1 day'));
            $factures = Facture::where('user_id', Auth::id())->where('type_fact', $x)->orderBy('created_at','desc')
                ->when($start_date, function ($query) use ($start_date, $end_date) {
                    return $query->whereBetween('date_facture', [$start_date, $end_date]);
                })->get();
        }


        // dd($t);
        $TTC = $factures->sum('ttc');
        $TTVA = $factures->sum('ttva');
        $THT = $factures->sum('tht');
        return view('main.factures.factures', compact('factures', 'TTC', 'TTVA', 'THT', 't', 'x'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function forme()
    {
        return view('main.factures.facture-type');
    }
    public function forme_bl()
    {
        return view('main.livraison.livraison-type');
    }
    public function forme_bc()
    {
        return view('main.bon-cmd.bon-cmd-type');
    }
    public function forme_b()
    {
        return view('main.bon.bon-type');
    }
    public function forme_fv()
    {
        return view('main.facture-d-avoir.facture-d-avoir-type');
    }
    public function forme_d()
    {
        return view('main.devis.devis');
    }
    public function forme_p()
    {
        return view('main.facture-proforma.facture-proforma');
    }

    public function create()
    {
        $user = User::where('id', Auth::id())->first();
        $clients = $user->clients;
        $articles = $user->articles->filter(function ($article) {
            return $article->quantite > 0;
        });
        // dd($ref);
        $pre = Numerotation::where('user_id', Auth::id())->first()->fact;
        $nbf = Facture::where('user_id', Auth::id())->count();
        $ref = $pre . $nbf + 1;
        if (isset($_GET['t']) && isset($_GET['Ex'])) {
            // dump($_GET['t'] . '__'.$_GET['Ex']);
            $type = $_GET['t'];
            if ($type == 'bl') {
                $n = 'bon_liv';
                $t = 'bon_livraison';
            } elseif ($type == 'bc') {
                $n = 'bon_cmd';
                $t = 'bon_cmd';
            } elseif ($type == 'b') {
                $n = 'bon';
                $t = 'bon';
            } elseif ($type == 'fv') {
                $n = 'fact_d_avoir';
                $t = 'facture_d_avoir';
            } elseif ($type == 'dv') {
                $n = 'devis';
                $t = 'devis';
            } elseif ($type == 'fp') {
                $n = 'fact_pro';
                $t = 'facture_proforma';
            } else {
                $n = 'fact';
                $t = 'facture';
            }
            $pre = Numerotation::where('user_id', Auth::id())->first()->$n;
            $nbf = Facture::where('user_id', Auth::id())->where('type_fact', $t)->count();
            $ref = $pre . $nbf + 1;
            $exemple = $_GET['Ex'];
            return view('main.factures.create', ['clients' => $clients, 'articles' => $articles, 't' => $type, 'ex' => $exemple, 'ref' => $ref]);
        }
        return view('main.factures.create', ['clients' => $clients, 'articles' => $articles, 't' => 'F', 'ex' => '1', 'ref' => $ref]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $uId = Auth::id();
        Facture::create([
            'ref' => $request->ref,
            'client_id' => $request->client,
            'user_id' => $uId,
            'date_facture' => date("Y/m/d"),
            'type_fact' => $request->type,
            'ttc' => $request->ttc,
            'tht' => $request->tht,
            'ttva' => $request->ttva,
            'exemple' => 'ex' . $request->ex,
            'mode_paiement' => $request->mode_paiement
        ]);
        $user = User::where('id', $uId)->first();
        $user->num_doc = $user->num_doc + 1;
        $user->save();
        $fact_id = Facture::where('user_id', $uId)->latest()->first()->id;
        $produits = $request->Produits;
        foreach ($produits as $pr) {
            Ligne_facture::create([
                'facture_id' => $fact_id,
                'article_id' => $pr['id'],
                'quantite' => $pr['Qtee'],
                'remise' => $pr['remise'],
                'tva' => $pr['tva'],
                'ttc' => $pr['TTc'],
            ]);
            $ar = Article::where('id', $pr['id'])->first();
            $ar->quantite = $ar->quantite - $pr['Qtee'];
            $ar->save();
        }
        return response()->json(['message' => $request->user, 'ref' => $request->ref, 'client' => $request->client, 'fact' => $fact_id]);
    }

    public function facturer(Request $request)
    {
        $u = Auth::id();
        $facture = Facture::where('user_id', $u)->where('id', $request->id)->first();
        $facture['type_fact'] = 'facture';
        $facture['ref'] = $request->ref;
        $facture->save();
        return to_route('facture.index', ['type' => 'f']);
    }
    /**
     * Display the specified resource.
     */
    public function show(Facture $facture)
    {
        $ex = $facture->exemple;
        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getNumberTransformer('fr');
        $ntw=strtoupper($numberTransformer->toWords($facture->ttc));
        // dd($ntw . ' dirhams');
        // dump($ex);
        $Ligne_fact = Ligne_facture::where('facture_id', $facture->id)->get();
        return view('main.docsFactures.' . $ex, compact('facture', 'Ligne_fact','ntw'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Facture $facture)
    {
        // dd($facture->lignes);
        $user = User::where('id', Auth::id())->first();
        $clients = $user->clients;
        $articles = $user->articles;
        $liste = [];
        foreach ($facture->lignes as $lg) {
            // $liste+=$lg->concat($lg->article);
            // $lg+=$lg->article;
            // $liste->concat($lg);
            // $x=$lg+ $lg->article;
            $lg->art = $lg->article;
            // dump($lg);
            array_push($liste, $lg);
        };
        // dd($liste);
        $jsonData = ['articlesJ' => $liste];
        return view('main.factures.edit', ['clients' => $clients, 'articles' => $articles, 'facture' => $facture, 'jsonData' => $jsonData]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Facture $facture)
    {
        $fid = $facture->id;

        $facture->update([
            'client_id' => $request->client,
            'ttc' => $request->ttc,
            'tht' => $request->tht,
            'ttva' => $request->ttva,
            'mode_paiement' => $request->mode_paiement
        ]);


        Ligne_facture::where('facture_id', $facture->id)->delete();
        $produits = $request->Produits;
        foreach ($produits as $pr) {
            Ligne_facture::create([
                'facture_id' => $fid,
                'article_id' => $pr['id'],
                'quantite' => $pr['Qtee'],
                'remise' => $pr['remise'],
                'tva' => $pr['tva'],
                'ttc' => $pr['TTc'],
            ]);
        }
        return response()->json(['request' => $request->Produits, 'facture' => $request->post(), 'fid' => $fid]);
        // return response()->json(['msg'=>'edit msg']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facture $facture)
    {
        // dd($facture);
        Ligne_facture::where('facture_id', $facture->id)->delete();
        $facture->delete();
        return to_route('all.factures')->with('success', 'Facture supprimee');
    }

    public function factureEmail($id){
        $facture=Facture::findOrFail($id);
        $user=Auth::user()->email;
        Mail::to($user)->send(new InvoiceEmail($facture));
        // Mail::to('naliyof707@bagonew.com')->send(new InvoiceEmail($facture));

        return back()->with('success','E-mail envoyé avec succès.');
    }


    public function test()
    {
        $invoices = Facture::get();
        // dd($invoices);
        return  view('main.factures.invoice', [
            'factures' => $invoices,
            'name' => 'big hero',
            'ttc' => '10020',
            'tva' => '5200',
            'tht' => '58784',
        ]);;
    }
}
