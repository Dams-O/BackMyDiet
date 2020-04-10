<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    //Tout les champs associés
    protected $fillable = [
    'picture',
    'title',
    'hashtag',
    'id_meal_library',
    'id_meal_category',
    'preparation_time',
    'cooking_time',
    'parts_number',
    ];

    /**
    * Nom de la table.
    *
    * @var string
    */
    protected $table = 'recipe';

    /**
     * Clé primaire.
     *
     * @var string
     */
    protected $primaryKey = 'id_recipe';

    /**
    * Active le timestamped automatique.
    * 
    * @var bool
    */
    public $timestamps = false;
}