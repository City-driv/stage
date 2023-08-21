<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('CheckAdmin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('created_at','desc')->get();
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

    public function updateUser(User $user,Request $request)
    {
        $user->fill($request->post())->save();
        // dd($request->post());
        return to_route('admin.index')->with('success','Compte a été bien modifié ');
    }
    
    public function updateUserOffre(User $user)
    {
        $NewDateExp= now()->addYears(1)->toDateString();
        $user->update(['num_doc'=>0,'date_exp'=>$NewDateExp]);
        //  dd($user);
        return to_route('admin.index')->with('success','L\'offre a été bien renouvelée ');
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
        $user->delete();
        return to_route('admin.index')->with('success','compte bien supprimer');
    }
}
