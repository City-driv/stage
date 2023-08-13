<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Numerotation extends Model
{
    use HasFactory;
    protected $fillable=['user_id','clt','art','fact','bon_liv','bon_cmd','bon','devis','fact_pro','fact_d_avoir','alr_inf','alr_sup'];

    public function user(){
        return $this->belongsTo(User::class,'user_id'); //1 numerotation 
    }
}
