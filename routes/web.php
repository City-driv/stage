<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CreditController;
use App\Http\Controllers\GarantieController;
use App\Http\Controllers\TestController;
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

Route::get('/', [TestController::class,'home'])->name('main');
Route::get('/contact', function () { return view('contact');})->name('contact');

Route::middleware('guest')->group(function () {
    Route::get('/inscription', function () { return view('auth.inscription');})->name('inscription');
    Route::get('/connexion', function () { return view('auth.connexion');})->name('connexion');
    // Route::get('/payement', function () { return view('payement');})->name('payement');
    Route::get('factureGratuit', function () { return view('factureGratuit');})->name('factureGratuit');
    Route::get('/page1', function () { return view('conditionsP1');})->name('conditions');
    Route::get('/page2', function () { return view('conditionsP2');});
    Route::get('/page3', function () { return view('conditionsP3');});
    Route::get('/page4', function () { return view('conditionsP4');});
});
Route::get('/payement',[TestController::class,'payement'])->name('payement');

Route::controller(UserController::class)->group(function () {
    Route::get('/logout', 'logout')->name('logout');
    //All routes for user controller goes here...
    
    Route::middleware('guest')->group(function () {
        Route::post('/signup', 'inscription')->name('enregistrer');
    Route::post('/login', 'login')->name('login');
    
    Route::get('/forgetPwd', 'forgetPwd')->name('forgetPwd');
    Route::post('/forgetPwd', 'forgetPwdPost')->name('forgetPwd.post');
    Route::get('/resetPwd/{token}/{email}', 'resetPwd')->name('resetPwd');
    Route::post('/resetPwdPost', 'resetPwdPost')->name('resetPwdPost');
});

Route::get('/home', 'index')->name('home')->middleware(['auth', 'check_user']);
Route::post('/contactPost','contact')->name('contact.post');
Route::get('/parametres/{id}/edit','edit')->name('parametres')->middleware('auth');
Route::put('/user/{id}','update')->name('user.update')->middleware('auth');

});

Route::middleware(['auth','check_user'])->group(function () {
    
    Route::get('/fournisseur/liste',[FournisseurController::class,'liste'])->name('fournisseur.liste');
    Route::resource('/fournisseur',FournisseurController::class);

    Route::resource('article',ArticleController::class);
    Route::post('/import',[ArticleController::class,'import'])->name('import.excel');
    Route::get('/etat_stock',[ArticleController::class,'stock'])->name('etat.stock');

    Route::resource('facture',FactureController::class);
    Route::get('/factures',[FactureController::class,'index'])->name('all.factures');
    Route::post('/facrture/store',[FactureController::class,'store']);
    Route::get('/facture-type',[FactureController::class,'forme'])->name('facture.type');
    Route::get('/bon-livraison-type',[FactureController::class,'forme_bl'])->name('bon-liv.type');
    Route::get('/bon-type',[FactureController::class,'forme_b'])->name('bon.type');
    Route::get('/bon-cmd-type',[FactureController::class,'forme_bc'])->name('bon.cmd.type');
    Route::get('/facture-avoir-type',[FactureController::class,'forme_fv'])->name('facture.avoir.type');
    Route::get('/devis_type',[FactureController::class,'forme_d'])->name('facture.devis.type');
    Route::get('/facture_proforma_type',[FactureController::class,'forme_p'])->name('facture.proforma.type');
    Route::resource('/credit',CreditController::class);

    Route::resource('/garantie',GarantieController::class);
    Route::resource('/clients',ClientController::class);
    Route::post('/import/client',[ClientController::class,'importCl'])->name('import.excel.client');


});


Route::get('test',function(){
    return view('main.docsFactures.ex1');
});
Route::get('test2',[FactureController::class,'test']);