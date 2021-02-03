<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stats extends Model
{

    /**
     * Retourne l'utilisateur associé à ces statistiques
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
    'xp',
    'tier',
    ];
    
    /**
    * Nom de la table.
    *
    * @var string
    */
    protected $table = 'stats';

    /**
     * Clé primaire.
     *
     * @var string
     */
    protected $primaryKey = 'id_stats';

    /**
    * Active le timestamped automatique.
    * 
    * @var bool
    */
    public $timestamps = false;
}