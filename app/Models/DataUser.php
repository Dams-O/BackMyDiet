<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataUser extends Model
{
    //Tout les champs associés
    protected $fillable = [
    'id_user',
    'id_meal_category'
    ];

    /**
    * Nom de la table.
    *
    * @var string
    */
    protected $table = 'data_user';

    /**
     * Clé primaire.
     *
     * @var string
     */
    protected $primaryKey = 'id_data_user';

    /**
    * Active le timestamped automatique.
    * 
    * @var bool
    */
    public $timestamps = true;
}