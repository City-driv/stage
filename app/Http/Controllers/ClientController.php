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
        $id = Auth::user()->id;
        $clients = Client::where('user_id', $id)->get();;
        return view('main.clients.index', compact('clients'));
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
            'name' => 'required',
            // 'adresse' => 'required',
            // 'telephone' => 'required',
            // 'ville' => 'required'
        ]);
        // $request['if']=212121;
        $request['user_id'] = Auth::id();
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
        return to_route('clients.index')->with('success', 'Nouveau client ajouté');
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
        return view('main.clients.edit', compact('client'));
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
        $request->validate([
            'name' => 'required',
            // 'adresse' => 'required',
            // 'telephone' => 'required',
            // 'ville' => 'required'
        ]);
        $client->fill($request->post())->save();
        return to_route('clients.index')->with('success', 'Client modifié');
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
        return to_route('clients.index')->with('success', 'Client supprimé');
    }

    public function importCl(Request $request)
    {
        $request->validate(['excelFileCl' => 'required|mimes:xlsx, xls']);
        $importedData = Excel::toArray(new ClientsImport, $request->file('excelFileCl'));

            // Check the header row for specific column names
            $expectedHeaders = ["name", "adresse", "telephone", "ice", "if", "ville"];
            $actualHeaders = array_keys($importedData[0][0]); // Assuming the first row is the header
           
            if ($expectedHeaders == $actualHeaders) {
                // The headers match the expected columns
                 Excel::import(new ClientsImport, $request->file('excelFileCl'));
            } else {
                // The headers don't match the expected columns
                return to_route('clients.index')->with('danger', 'Erreur lors de l\'importation de la ligne : Un ou plusieurs champs sont manquants ou mal nommés.');
            }

        return to_route('clients.index')->with('success', 'Fichier importé avec succès.');
    }
}
