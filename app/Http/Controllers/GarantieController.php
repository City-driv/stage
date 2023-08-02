<?php

namespace App\Http\Controllers;

use App\Models\Garantie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GarantieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $garanties=Garantie::where('user_id',Auth::id())->get();
        // dd($garanties);
        return view('main.garanties.index',compact('garanties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user=User::where('id',Auth::id())->first();
        $clients=$user->clients;
        $articles=$user->articles;
        return view('main.garanties.create',compact('clients','articles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date_achat'=>'required',
            'date_fin'=>'required',
        ]);
        $request['user_id'] =Auth::id() ; 
        Garantie::create($request->post());
        return to_route('garantie.index')->with('success','Garantie ajoutee');
    }

    /**
     * Display the specified resource.
     */
    public function show(Garantie $garantie)
    {
        return view('main.garanties.show',compact('garantie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Garantie $garantie)
    {
        $user=User::where('id',Auth::id())->first();
        $clients=$user->clients;
        $articles=$user->articles;
        return view('main.garanties.edit',compact('garantie','clients','articles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Garantie $garantie)
    {
        $request->validate([
            'date_achat'=>'required',
            'date_fin'=>'required',
        ]);
        $garantie->fill($request->post())->save();
        return to_route('garantie.index')->with('success','Garantie Modifier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Garantie $garantie)
    {
        $garantie->delete();
        return view('main.garanties.index')->with('success','garantie supprimer');
    }
}
