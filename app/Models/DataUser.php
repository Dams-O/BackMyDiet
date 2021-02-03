<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataUser extends Model
{

    /**
     * Retourne l'utilisateur affilié à ces données
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo;
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }


    /**
     * Retourne les aliments liés à ce jeu de donnée
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany;
     */
    public function foods()
    {
        return $this->belongsToMany(FoodLibrary::class, 'data_user_has_food', 'id_data_user', 'id_food');

    }


    //Tout les champs associés
    protected $fillable = [
    'id_user',
    'id_meal_category'
    ];

    /**
    * Nom de la table.
    *
    * @var string
    */
    protected $table = 'data_user';

    /**
     * Clé primaire.
     *
     * @var string
     */
    protected $primaryKey = 'id_data_user';

    /**
    * Active le timestamped automatique.
    * 
    * @var bool
    */
    public $timestamps = true;
}