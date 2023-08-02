<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ligne_facture extends Model
{
    use HasFactory;
    protected $fillable=['facture_id','article_id','quantite','remise','tva','ttc'];

    public function facture(){
        return $this->belongsTo(Facture::class,'facture_id');
    }

    public function article(){
        return $this->belongsTo(Article::class,'article_id');
    }
    
}
