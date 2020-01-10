<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MealCategories extends Model
{
    //Tout les champs associés
    protected $fillable = [
    'name',
    ];

    /**
    * Nom de la table.
    *
    * @var string
    */
    protected $table = 'meal_categories';

    /**
     * Clé primaire.
     *
     * @var string
     */
    protected $primaryKey = 'id_meal_category';

    /**
    * Active le timestamped automatique.
    * 
    * @var bool
    */
    public $timestamps = true;
}