<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MealCategories extends Model
{

    /**
     * Retourne les repas associés à cette catégorie de repas
     * 
     * @return Illuminate\Database\Eloquent\Relations\HasMany;
     */
    public function meals()
    {
        return $this->hasMany(MealLibrary::class, 'id_meal_category');
    }

    /**
     * Retourne les menus type associés à cette catégorie de repas
     * 
     * @return Illuminate\Database\Eloquent\Relations\HasMany;
     */
    public function menus()
    {
        return $this->hasMany(MealType::class, 'id_meal_category');
    }

     /**
     * Retourne les recettes associés à cette catégorie de repas
     * 
     * @return Illuminate\Database\Eloquent\Relations\HasMany;
     */
    public function recipes()
    {
        return $this->hasMany(Recipe::class, 'id_meal_category');
    }

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
    public $timestamps = false;
}