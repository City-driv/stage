<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable=['description','quantite','price','tva','user_id'];
    
    public function user() {
        return $this->belongsTo(User::class,'user_id'); //article belongs to a single User. One
    }
}
