<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MealType extends Model
{

    

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