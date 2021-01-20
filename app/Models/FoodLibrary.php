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
        return $this->belongsTo(Category::class);
    }
    
    /**
     * Retourne les jeux de données liés à cet aliment
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany;
     */
    public function datas()
    {
        return $this->belongsToMany(DataUser::class)
                    ->using(DataUserHasFood::class)
                    ->withPivot('id_data_user')
                    ->withTimestamps();
    }

    /**
     * Retourne les repas contenant cet aliment
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany;
     */
    public function meals()
    {
        return $this->belongsToMany(MealLibrary::class)
                    ->using(MealLibraryHasFood::class)
                    ->withPivot('id_meal')
                    ->withTimestamps();
    }


     /**
     * Retourne les recettes associés à cet aliment
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany;
     */
    public function recipes()
    {
        return $this->belongsToMany(Recipe::class)
                    ->using(RecipeHasFood::class)
                    ->withPivot('id_recipe')
                    ->withTimestamps();
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
   

   
