<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //Tout les champs associés
    protected $fillable = [
    'id_user',
    'matin',
    'midi',
    'soir',
    'collation',
    'recap_journee',
    ];

    /**
    * Nom de la table.
    *
    * @var string
    */
    protected $table = 'menutypes';

    /**
     * Clé primaire.
     *
     * @var string
     */
    protected $primaryKey = 'id_menu';

    /**
    * Active le timestamped automatique.
    * 
    * @var bool
    */
    public $timestamps = false;
}