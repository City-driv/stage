<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ligne_credit extends Model
{
    use HasFactory;
    protected $fillable = ['credit_id','montant','date','observation','mode_paiement'];

    public function credit(){
        return $this->belongsTo(Credit::class,'credit_id');
    }
}
