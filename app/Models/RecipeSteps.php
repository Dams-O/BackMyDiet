<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecipeSteps extends Model
{
    //Tout les champs associés
    protected $fillable = [
    'id_recipe_steps',
    'id_recipe',
    'step_number',
    ];

    /**
    * Nom de la table.
    *
    * @var string
    */
    protected $table = 'recipe_steps';

    /**
     * Clé primaire.
     *
     * @var string
     */
    protected $primaryKey = 'id_recipe_steps';

    /**
    * Active le timestamped automatique.
    * 
    * @var bool
    */
    public $timestamps = true;
}