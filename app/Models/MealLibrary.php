<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MealLibrary extends Model
{
    //Tout les champs associés
    protected $fillable = [
    'id_meal_category',
    'name',
    ];

    /**
    * Nom de la table.
    *
    * @var string
    */
    protected $table = 'meal_library';

    /**
     * Clé primaire.
     *
     * @var string
     */
    protected $primaryKey = 'id_meal';

    /**
    * Active le timestamped automatique.
    * 
    * @var bool
    */
    public $timestamps = false;
}