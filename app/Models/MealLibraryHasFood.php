<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class MealLibraryHasFood extends Pivot
{
    //Tout les champs associés
    protected $fillable = [
    'id_meal',
    'id_food',
    ];

    /**
    * Nom de la table.
    *
    * @var string
    */
    protected $table = 'meal_library_has_food';

    /**
     * Clé primaire.
     *
     * @var string
     */
    protected $primaryKey = 'id_meal_library_hf';

    /**
    * Active le timestamped automatique.
    * 
    * @var bool
    */
    public $timestamps = false;
}