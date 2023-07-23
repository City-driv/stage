<?php

namespace App\Http\Controllers;

use App\Http\Requests\FournisseurRequest;
use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id=Auth::user()->id;
        if (isset($_GET['search'])) {
            $fournisseurs = Fournisseur::where('user_id',$id)->
                                         where('nom_entreprise', 'LIKE', '%' . $_GET['search'] . '%')->get();
        } else {
            $fournisseurs = Fournisseur::where('user_id',$id)->get();
        }
        return view('main.fournisseurs.index', compact('fournisseurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('main.fournisseurs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FournisseurRequest $request)
    {
        $request['user_id'] = Auth::user()->id;
        if ($request->hasFile('photo')) {
            $img = time() . '-' . $request->file('photo')->getClientOriginalName();
            $request['photo'] = $img;
            $request->file('photo')->move(\public_path('Fimgs'), $img);
        }
        // dd($request->post());

        Fournisseur::create($request->post());
        return to_route('fournisseur.index')->with('success', 'Fournisseur bien ajoutée');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fournisseur $fournisseur)
    {
        return view('main.fournisseurs.show', compact('fournisseur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fournisseur $fournisseur)
    {
        return view('main.fournisseurs.edit', compact('fournisseur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FournisseurRequest $request, Fournisseur $fournisseur)
    {
        if ($request->hasFile('photo')) {
            $img = time() . '-' . $request->file('photo')->getClientOriginalName();
            $request['photo'] = $img;
            $request->file('photo')->move(\public_path('Fimgs'), $img);
            if (File::exists('Fimgs/' . $fournisseur->photo)) {
                File::delete('Fimgs/' . $fournisseur->photo);
            }
        }
        $fournisseur->fill($request->post())->save();
        return to_route('fournisseur.index')->with('success','Fournisseur bien modifier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fournisseur $fournisseur)
    {
        if (File::exists('Fimgs/' . $fournisseur->photo)) {
            File::delete('Fimgs/' . $fournisseur->photo);
        }
        $fournisseur->delete();
        return to_route('fournisseur.index')->with('success', 'fournisseur supprimer');
    }

    public function liste()
    {
        $id=Auth::user()->id;
        if (isset($_GET['search'])) {
            $fournisseurs = Fournisseur::where('user_id',$id)->
                                         where('nom_entreprise', 'LIKE', '%' . $_GET['search'] . '%')->get();
        } else {
            $fournisseurs = Fournisseur::where('user_id',$id)->get();
        }
        return view('main.fournisseurs.liste', compact('fournisseurs'));
    }
}
