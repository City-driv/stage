<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.index', compact(['users']));
    }

    public function activer($id)
    {
        DB::table('users')->where('id', $id)->update(['status' => 'active']);
        return to_route('admin.index')->with('success', 'Compte bien Activer');
    }
    public function desactiver($id)
    {
        DB::table('users')->where('id', $id)->update(['status' => 'test']);
        return to_route('admin.index')->with('success', 'Compte bien Desactiver');
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd('delete' .$id);
        $user=User::find($id);
        // dd($user);
        $user->delete();
        return to_route('admin.index')->with('success','compte bien supprimer');
    }
}
