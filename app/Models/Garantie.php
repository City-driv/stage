<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Garantie extends Model
{
    use HasFactory;
    protected $fillable=['client_id','article_id','email','date_achat','date_fin','num_serie','user_id'];

    public function client(){
        return $this->belongsTo(Client::class,'client_id');
    }
    public function article() {
        return $this->belongsTo(Article::class, 'article_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
