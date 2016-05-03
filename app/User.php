<?php

namespace BovinApp;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =  ['name', 'email', 'password', 'last_name', 'user', 'type', 'active', 'address'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    // Relation with Orders: Cada usuario puede tener dos o mas pedidos.
    public function orders()
    {
        return $this->hasMany('BovinApp\Order');
    }
}
