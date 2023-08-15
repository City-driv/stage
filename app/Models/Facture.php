<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;
    protected $fillable=['ref','type_fact','date_facture','client_id','user_id','ttc','tht','ttva','exemple','mode_paiement'];

    public function userFact(){
       return $this->belongsTo(User::class,'user_id')->cascadeDelete(); //facture belongs to a single User .
    }
    public function clientFact(){
       return $this->belongsTo(Client::class,'client_id')->cascadeDelete(); //facture belongs to a single Client .
    }
    public function lignes(){
      return $this->hasMany(Ligne_facture::class);
    }

}
