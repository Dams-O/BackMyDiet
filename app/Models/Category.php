<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
    * Nom de la table.
    *
    * @var string
    */
    protected $table = 'categories';

    /**
     * Clé primaire.
     *
     * @var string
     */
    protected $primaryKey = 'id_category';

    //Tout les champs associés
    protected $fillable = [
        'name',
    ];

    /**
     * Retourne l'aliment concerné par ce lien
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo;
     */
    public function foodLibrary()
    {
        return $this->hasMany(FoodLibrary::class, 'id_food');
    }
}
