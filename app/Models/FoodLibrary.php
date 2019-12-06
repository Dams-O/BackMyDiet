<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodLibrary extends Model
{
    //Tout les champs associés
    protected $fillable = [
    'id_food',
    'id_category',
    'name',
    ];

    /**
    * Nom de la table.
    *
    * @var string
    */
    protected $table = 'food_library';

    /**
     * Clé primaire.
     *
     * @var string
     */
    protected $primaryKey = 'id_food';

    /**
    * Active le timestamped automatique.
    * 
    * @var bool
    */
    public $timestamps = false;
}