<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class DataUserHasFood extends Pivot
{

    /**
     * Retourne l'aliment concerné par ce lien
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo;
     */
    public function food()
    {
        return $this->belongsTo(FoodLibrary::class);
    }

    /**
     * Retourne le jeu de données concerné
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo;
     */
    public function data()
    {
        return $this->belongsTo(DataUser::class);
    }
    
    //Tout les champs associés
    protected $fillable = [
    'id_data_user',
    'id_food',
    ];

    /**
    * Nom de la table.
    *
    * @var string
    */
    protected $table = 'data_user_has_food';

    /**
     * Clé primaire.
     *
     * @var string
     */
    protected $primaryKey = 'id_data_user_hf';

    /**
    * Active le timestamped automatique.
    * 
    * @var bool
    */
    public $timestamps = false;
}