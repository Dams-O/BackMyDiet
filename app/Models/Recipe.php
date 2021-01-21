<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{

    /**
     * Retourne les aliments utilisés dans cette recette
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany;
     */
    public function foods()
    {
        return $this->belongsToMany(FoodLibrary::class, 'recipe_has_food', 'id_recipe', 'id_food');
    }


    /**
     * Retourne les étapes de cette recette
     * 
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function steps()
    {
        return $this->hasMany(RecipeSteps::class, 'id_recipe');
    }


    /**
     * Retourne le repas associé à cette recette
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function meal()
    {
        return $this->belongsTo(MealLibrary::class, 'id_meal');
    }


    //Tout les champs associés
    protected $fillable = [
    'picture',
    'title',
    'hashtag',
    'id_meal',
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