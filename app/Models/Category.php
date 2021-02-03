<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    /**
     * Retourne les aliments associés à cette catégorie
     * 
     * @return Illuminate\Database\Eloquent\Relations\HasMany;
     */
    public function foods()
    {
        return $this->hasMany(FoodLibrary::class, 'id_category');
    }

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

}