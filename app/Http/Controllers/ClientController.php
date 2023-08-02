<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Imports\ClientsImport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=Auth::user()->id;
        $clients=Client::where('user_id',$id)->get();;
        return view('main.clients.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('main.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->post());
        $request->validate([
            'name'=> 'required',
            'adresse'=> 'required',
            'telephone'=>'required',
            'ville'=>'required'
        ]);
        // $request['if']=212121;
        $request['user_id']=Auth::id();
        // dd($request->post());
        Client::create($request->post());

        // Client::create([
        //     'name'=> $request->name,
        //     'adresse'=>$request->adresse,
        //     'telephone'=>$request->telephone,
        //     'ice'=>$request->ice,
        //     'if'=>$request->if,
        //     'ville'=>$request->ville,
        //     'user_id'=>'1'
        // ]);
        return to_route('clients.index')->with('success','Nouveau client ajoutee');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('main.clients.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $client->fill($request->post())->save();
        return to_route('clients.index')->with('success','Client bien modifier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return to_route('clients.index')->with('success','deleted successfuly');
    }

    public function importCl(Request $request){
        $request->validate(['excelFileCl'=>'required']);
        Excel::import(new ClientsImport ,$request->file('excelFileCl'));

        return to_route('clients.index')->with('success','Clients importées');
    }
}
