<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpenFoodFacts extends Model
{
    use HasFactory;

    /**
     * Clé primaire.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'category_id',
        'name',
        'nb_products',
        'moy_glucides',
        'moy_lipides',
        'moy_proteines',
        'moy_sodium',
        'moy_energie',
        'med_glucides',
        'med_lipides',
        'med_proteines',
        'med_sodium',
        'med_energie',
        'created_at'
    ];

    /**
     * Nom de la table.
     *
     * @var string
     */
    protected $table = 'open_food_facts_library';

    public function scopeFindByCategoryId(Builder $query, ?string $category_id)
    {
        if ($category_id) {
            return $query->where('category_id', '=', $category_id);
        }
    }

    public function scopeSearch(Builder $query, ?string $search)
    {
        if ($search) {
            return $query->where('name', 'LIKE', "%{$search}%");
        }
    }
}
