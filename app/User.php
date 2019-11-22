<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     *
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    //Tout les champs associés
    protected $fillable = [
    'first_name',
    'last_name',
    'pseudo',
    'mail',
    'password',
    ];
    
    /**
    * Nom de la table.
    *
    * @var string
    */
    protected $table = 'users';

    /**
     * Clé primaire.
     *
     * @var string
     */
    protected $primaryKey = 'id_user';

    /**
    * Active le timestamped automatique.
    * 
    * @var bool
    */
    public $timestamps = true;
}
