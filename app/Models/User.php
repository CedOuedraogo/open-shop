<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Produit;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function produits()
    {

        return $this->belongsToMany(Produit::class);
       
    }

    public function role()
     {
         return $this->belongsTo(Role::class);

    }

    public function isAdmin()  // fonction pour verifier voir si un utilisateur est admin ou pas
    {
        if($this->role->profil=='super-admin' OR $this->role->profil=='admin') {
            return true;
        }
        else {return false;}
    }
    //smsnotif

    public function routeNotificationForNexmo($notification)
    {
        return $this->phone_number;
    }
}
