<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneAchat extends Model
{
    use HasFactory;
    protected $fillable=['achat_id','article_id','qte_cmd','qte_recue','price'];

    public function article(){
        return $this->belongsTo(Article::class,'article_id');
    }
    public function achat(){
        return $this->belongsTo(Achat::class,'achat_id');
    }
}
