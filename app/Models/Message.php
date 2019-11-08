<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //Tout les champs associés
    protected $fillable = [
    'id_user',
    'contenu',
    ];

    /**
    * Nom de la table.
    *
    * @var string
    */
    protected $table = 'message';

    /**
     * Clé primaire.
     *
     * @var string
     */
    protected $primaryKey = 'id_message';

    /**
    * Active le timestamped automatique.
    * 
    * @var bool
    */
    public $timestamps = false;
}