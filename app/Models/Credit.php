<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    use HasFactory;
    protected $fillable=['client_id','user_id','type','ref','p_marchandise','p_avance','p_reste','motif','mode_paiment','date_credit','piece_jointe','observation'];

    public function client(){
        return $this->belongsTo(Client::class,'client_id'); //facture belongs to a single Client .
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    
}
