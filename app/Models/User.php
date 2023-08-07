<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'entreprise_name',
        'telephone',
        'ice',
        'pack',
        'status',
        'fj',
        'num_pattente',
        'num_rc',
        'cnss',
        'img',
        'site_web',
        'adresse',
        'mobile',
        'site_web',
        'if'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function clients(){
        return $this->hasMany(Client::class);
    }
    public function articles(){
        return $this->hasMany(Article::class);
    }
    public function fournisseurs(){
        return $this->hasMany(Fournisseur::class);
    }
    
}
