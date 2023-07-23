<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;
    protected $fillable=['code_fournisseur','type_fournisseur','nom_entreprise','photo','if','fj','ice','adresse','email','telephone','mobile','num_compte','nom_banque','site_internet','code_postale','pays','user_id'];

    public function user(){
        return $this->belongsTo(User::class); //relation one to many with User model.
    }
}
