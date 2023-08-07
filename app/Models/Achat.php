<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achat extends Model
{
    use HasFactory;
    protected $fillable = ['fournisseur_id','user_id','numero','date','total','remiseGlobal','mode_paiement','mode_livraison','type','piece_jointe'];

    public function fournisseur(){
        return $this->belongsTo(Fournisseur::class,'fournisseur_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function lignesA(){
        return $this->hasMany(LigneAchat::class);
    }
}
