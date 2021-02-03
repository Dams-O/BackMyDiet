<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataIcecube extends Model
{


    /**
     * Renvoie l'utlisateur lié à cet ensemble de données
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo;
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    //Tout les champs associés
    protected $fillable = [
    'id_user',
    'calcium',
    'prot',
    'GL',
    'FVSM',
    'MG',
    'sucre',
    'score',
    ];

    /**
    * Nom de la table.
    *
    * @var string
    */
    protected $table = 'data_icecube';

    /**
     * Clé primaire.
     *
     * @var string
     */
    protected $primaryKey = 'id_data_icecube';

    /**
    * Active le timestamped automatique.
    * 
    * @var bool
    */
    public $timestamps = true;
}