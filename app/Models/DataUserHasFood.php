<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataUserHasFood extends Model
{
    //Tout les champs associés
    protected $fillable = [
    'id_data_user',
    'id_food',
    ];

    /**
    * Nom de la table.
    *
    * @var string
    */
    protected $table = 'data_user_has_food';

    /**
     * Clé primaire.
     *
     * @var string
     */
    protected $primaryKey = 'id_data_user_hf';

    /**
    * Active le timestamped automatique.
    * 
    * @var bool
    */
    public $timestamps = false;
}