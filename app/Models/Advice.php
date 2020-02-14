<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advice extends Model
{
    //Tout les champs associés
    protected $fillable = [
    'id_advice',
    'description',
    ];

    /**
    * Nom de la table.
    *
    * @var string
    */
    protected $table = 'advice';

    /**
     * Clé primaire.
     *
     * @var string
     */
    protected $primaryKey = 'id_advice';

    /**
    * Active le timestamped automatique.
    * 
    * @var bool
    */
    public $timestamps = true;
}