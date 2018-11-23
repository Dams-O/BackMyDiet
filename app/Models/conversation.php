<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    //Tout les champs associés
    protected $fillable = [
    'utils',
    ];

    /**
    * Nom de la table.
    *
    * @var string
    */
    protected $table = 'conversation';

    /**
     * Clé primaire.
     *
     * @var string
     */
    protected $primaryKey = 'id_conv';

    /**
    * Active le timestamped automatique.
    * 
    * @var bool
    */
    public $timestamps = false;
}