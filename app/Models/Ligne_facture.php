<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ligne_facture extends Model
{
    use HasFactory;
    protected $fillable=['facture_id','article_id','quantite','remise','tva'];

    public function facture(){
        return $this->belongsTo(Facture::class);
    }

    public function articles(){
        return $this->hasMany(Article::class);
    }
    
}
