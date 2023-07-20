<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/contact', function () { return view('contact');})->name('contact');

Route::middleware('guest')->group(function () {
    Route::get('/inscription', function () { return view('auth.inscription');})->name('inscription');
    Route::get('/connexion', function () { return view('auth.connexion');})->name('connexion');
    Route::get('/payement', function () { return view('payement');})->name('payement');
    Route::get('factureGratuit', function () { return view('factureGratuit');})->name('factureGratuit');
    Route::get('/page1', function () { return view('conditionsP1');})->name('conditions');
    Route::get('/page2', function () { return view('conditionsP2');});
    Route::get('/page3', function () { return view('conditionsP3');});
    Route::get('/page4', function () { return view('conditionsP4');});
});
Route::controller(UserController::class)->group(function () {
    //All routes for user controller goes here...
    Route::middleware('guest')->group(function () {
    Route::post('/signup', 'inscription')->name('enregistrer');
    Route::post('/login', 'login')->name('login');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/forgetPwd', 'forgetPwd')->name('forgetPwd');
    Route::post('/forgetPwd', 'forgetPwdPost')->name('forgetPwd.post');
    Route::get('/resetPwd/{token}/{email}', 'resetPwd')->name('resetPwd');
    Route::post('/resetPwdPost', 'resetPwdPost')->name('resetPwdPost');
    });
    Route::get('/home', 'index')->name('home')->middleware(['auth', 'check_user']);
    Route::post('/contactPost','contact')->name('contact.post');

});

Route::get('test',function(){
    return view('test');
});
Route::get('test2',function(){
    return view('factureP');
});