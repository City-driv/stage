<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use DateTime;
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
        'if',
        'num_doc',
        'date_cr',
        'date_exp'
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
        // 'password' => 'hashed',
    ];
    public function clients()
    {
        return $this->hasMany(Client::class);
    }
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
    public function fournisseurs()
    {
        return $this->hasMany(Fournisseur::class);
    }
    public function documents()
    {
        return $this->hasMany(Facture::class);
    }
    public function getFormattedCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('Y-m-d');
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            if ($user->date_cr !==null && $user->date_exp!==null) {
                $date_cr = new DateTime($user->date_cr); // Convertir la chaîne en objet DateTime
                $date_exp = new DateTime($user->date_exp); // Convertir la chaîne en objet DateTime
                $yearDifference = $date_cr->diff($date_exp)->y;
                // Définir une condition où la date de création dépasse 1 an
                if ($yearDifference >=1 ) {
                    $user->update(['status' => 'inactive']);
                }
            }
        });
    }

}
