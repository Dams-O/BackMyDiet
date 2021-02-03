<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodLibrary extends Model
{
     /**
     * Retourne la catégorie
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo;
     */
    public function categorie()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }
    
    /**
     * Retourne les jeux de données liés à cet aliment
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany;
     */
    public function datas()
    {
        return $this->belongsToMany(DataUser::class, 'data_user_has_food', 'id_food', 'id_data_user');
                    
    }

    /**
     * Retourne les repas contenant cet aliment
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany;
     */
    public function meals()
    {
        return $this->belongsToMany(MealLibrary::class, 'meal_library_has_food', 'id_food', 'id_meal');
                    
    }


     /**
     * Retourne les recettes associés à cet aliment
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany;
     */
    public function recipes()
    {
        return $this->belongsToMany(Recipe::class, 'recipe_has_food', 'id_food', 'id_recipe');
    }
    
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
   

   
