<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MealLibrary extends Model
{

    /**
     * Retourne les aliments de ce repas
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany;
     */
    public function foods()
    {
        return $this->belongsToMany(FoodLibrary::class, 'meal_library_has_food', 'id_meal', 'id_food');
                    
    }

    /**
     * Retourne la catégorie de repas de ce repas
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo;
     */
    public function meal_category()
    {
        return $this->belongsTo(MealCategories::class, 'id_meal_category');
    }

    /**
     * Retourne les recettes associés à ce repas
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany;
     */
    public function recipes()
    {
        return $this->hasMany(Recipe::class, 'id_meal');
    }

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