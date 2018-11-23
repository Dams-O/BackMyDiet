<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    //Tout les champs associés
    protected $fillable = [
    'id_conv',
    'utils',
    ];

    /**
    * Nom de la table.
    *
    * @var string
    */
    protected $table = 'Conversation';

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