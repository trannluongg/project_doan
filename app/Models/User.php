<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Admin\SetField\UserField;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableInterface;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Auth\Authenticatable;

class User extends Model implements JWTSubject, AuthenticatableInterface
{
    use Authenticatable, Authorizable;

    protected $table = 'users';
    protected $guarded = [];

    public $fieldClass = UserField::class;

    public $relationships = [
        'user_bills'        => Bills::class
    ];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'address', 'date_of_birth', 'phone', 'status', 'gender', 'avatar', 'driver', 'id_sub',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
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
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function user_bills()
    {
        return $this->hasMany(Bills::class, 'bil_user');
    }

}
