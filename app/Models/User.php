<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $primaryKey = 'id_user';


    /**
     * Retourne une liste de donnée sur un mois
     * @return Illuminate\Database\Eloquent\Relations\HasMany;
     */
    public function dataIces()
    {
        return $this->hasMany(DataIcecube::class, 'id_data_icecube');
    }

    /**
     * Retourne les statistiques de l'utilisateur
     * 
     * @return Illuminate\Database\Eloquent\Relations\HasOne;
     */
    public function stats()
    {
        return $this->hasOne(Stats::class);
    }

    /**
     * Retourne la liste des menus Type de cet user
     * @return Illuminate\Database\Eloquent\Relations\HasMany;
     */
    public function menuTypes()
    {
        return $this->hasMany(MealType::class, 'id_meal_type');
    }

    /**
     * retourne la liste des entrées utilisateur
     * @return Illuminate\Database\Eloquent\Relations\HasMany;
     */
    public function dataUser()
    {
        return $this->hasMany(DataUser::class, 'id_user');
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'api_token',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
}
