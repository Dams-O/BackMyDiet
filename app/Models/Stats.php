<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stats extends Model
{
    //Tout les champs associés
    protected $fillable = [
    'id_utilisateur',
    'xp',
    'tier',
    ];

    /**
    * Nom de la table.
    *
    * @var string
    */
    protected $table = 'stats';

    /**
     * Clé primaire.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
    * Active le timestamped automatique.
    * 
    * @var bool
    */
    public $timestamps = false;
}