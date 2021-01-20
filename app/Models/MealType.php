<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MealType extends Model
{


    /**
     * Retourne la catégorie de repas de ce menu type
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function meal_category()
    {
        return $this->belongsTo(MealCategories::class, 'id_meal_category');
    }


    /**
     * Retourne l'utilisateur associe à ce menu type
     * 
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    

    //Tout les champs associés
    protected $fillable = [
        'id_user',
        'id_meal_category',
        'calcium',
        'prot',
        'GL',
        'FVSM',
        'MG',
        'sucre',
        'score',
        'created_at'
    ];

    /**
    * Nom de la table.
    *
    * @var string
    */
    protected $table = 'meal_type';

    /**
     * Clé primaire.
     *
     * @var string
     */
    protected $primaryKey = 'id_meal_type';

    /**
    * Active le timestamped automatique.
    * 
    * @var bool
    */
    public $timestamps = false;
}