<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function home()
    {
        // dd(Auth::user()->status);
        if (isset(Auth::user()->status)) {
            if (Auth::user()->status == 'active') {
                $user = Auth::user();
                if ($user->admin == 0) {
                    if ($user->date_cr !== null && $user->date_exp !== null) {
                        if (($user->date_cr >= $user->date_exp) || ($user->pack == 'perso' && $user->num_doc >= 1000) || ($user->pack == 'starter' && $user->num_doc >= 3000) || ($user->pack == 'demo' && $user->num_doc >= 10)) {
                            $userModel = User::find($user->id); // Charger le modèle complet depuis la base de données
                            $userModel->status = 'inactive';
                            $userModel->save();
                        }
                    }
                }
                return to_route('home');
            }
            return to_route('payement');
        }
        return view('index');
    }

    public function payement()
    {
        // dd(Auth::user()->status);
        if (isset(Auth::user()->status)) {
            if (Auth::user()->status == 'active') {
                return to_route('home');
            }
            return view('payement');
        }
        return view('payement');
    }
}
