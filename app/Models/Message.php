<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //Tout les champs associés
    protected $fillable = [
    'id_message',
    'id_utilisateur',
    'contenu',
    ];

    /**
    * Nom de la table.
    *
    * @var string
    */
    protected $table = 'Message';

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