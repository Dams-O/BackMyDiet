<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonneeSuivi extends Model
{
    //Tout les champs associés
    protected $fillable = [
    'id_util',
    'calcium',
    'prot',
    'GL',
    'FVSM',
    'MG',
    'sucre',
    'score',
    'create_at',
    ];

    /**
    * Nom de la table.
    *
    * @var string
    */
    protected $table = 'donnee_suivi';

    /**
     * Clé primaire.
     *
     * @var string
     */
    protected $primaryKey = 'id_donnee';

    /**
    * Active le timestamped automatique.
    * 
    * @var bool
    */
    public $timestamps = true;
}