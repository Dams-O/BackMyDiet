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
        'mdp', 'remember_token',
    ];

    //Tout les champs associés
    protected $fillable = [
    'id_utilisateur',
    'nom',
    'prenom',
    'pseudo',
    'email',
    'mdp',
    ];
    
    /**
    * Nom de la table.
    *
    * @var string
    */
    protected $table = 'utilisateurs';

    /**
     * Clé primaire.
     *
     * @var string
     */
    protected $primaryKey = 'id_utilisateur';
}
