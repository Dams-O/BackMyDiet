<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class MealLibraryHasFood extends Pivot
{

    /**
     * Retourne le repas concerné par ce lien
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function meal()
    {
        return $this->belongsTo(MealCategories::class, 'id_meal');
    }


    /**
     * Retourne l'aliment concerné par ce lien
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function food()
    {
        return $this->belongsTo(FoodLibrary::class, 'id_food');
    }

    //Tout les champs associés
    protected $fillable = [
        'id_meal',
        'id_food',
    ];

    /**
    * Nom de la table.
    *
    * @var string
    */
    protected $table = 'meal_library_has_food';

    /**
     * Clé primaire.
     *
     * @var string
     */
    protected $primaryKey = 'id_meal_library_hf';

    /**
    * Active le timestamped automatique.
    * 
    * @var bool
    */
    public $timestamps = false;
}