<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecipeSteps extends Model
{

    /**
     * Retourne la recette asspciée à cette étape
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recipe()
    {
        return $this->belongsTo(Recipe::class, 'id_recipe');
    }

    //Tout les champs associés
    protected $fillable = [
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
    public $timestamps = false;
}