<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function home(){
        // dd(Auth::user()->status);
        if (isset(Auth::user()->status)) {
            if (Auth::user()->status=='active') {
                return to_route('home') ;
            }
            return to_route('payement') ;
        }
        return view('index');
    }

    public function payement(){
        // dd(Auth::user()->status);
        if (isset(Auth::user()->status)) {
            if (Auth::user()->status=='active') {
                return to_route('home') ;
            }
            return view('payement') ;
        }
        return view('payement');
    }
}
