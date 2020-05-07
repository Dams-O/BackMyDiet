<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecipeHasFood extends Model
{
    //Tout les champs associés
    protected $fillable = [
    'id_recipe',
    'id_food',
    'description',
    ];

    /**
    * Nom de la table.
    *
    * @var string
    */
    protected $table = 'recipe_has_food';

    /**
     * Clé primaire.
     *
     * @var string
     */
    protected $primaryKey = 'id_recipe_hf';

    /**
    * Active le timestamped automatique.
    * 
    * @var bool
    */
    public $timestamps = false;
}