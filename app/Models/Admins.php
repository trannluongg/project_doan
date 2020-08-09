<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableInterface;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Modules\Admin\SetField\AdminField;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Admins extends Model implements JWTSubject, AuthenticatableInterface
{
    use Authenticatable, Authorizable, HasRoles;

    protected $table = 'admins';
    protected $guarded = [];

    public $fieldClass = AdminField::class;

    public $relationships = [
        'roles_admin'     => Role::class,
        'permissions_admin' => Permission::class
    ];
    protected $hidden = [
        'password', 'remember_token'
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

    public function roles_admin()
    {
        return $this->belongsToMany(Role::class,'model_has_roles','model_id', 'role_id');
    }

    public function permissions_admin()
    {
        return $this->belongsToMany(Permission::class,'model_has_permissions','model_id', 'permission_id');
    }
}
