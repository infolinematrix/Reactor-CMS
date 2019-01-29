<?php

namespace ReactorCMS\Entities;


use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends \Reactor\Users\User implements JWTSubject
{
    //use CacheQueryBuilder;

    //
    protected $table = 'users';
<<<<<<< HEAD
    protected $fillable = ['email', 'password', 'first_name', 'last_name','type','status'];
=======
    protected $fillable = ['email', 'password', 'first_name', 'last_name'];
>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c

    public function isAdmin()
    {
        return $this->hasRole('ADMINISTRATOR') || $this->hasPermission('ADMINISTRATOR');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
<<<<<<< HEAD

    public function nodes()
    {
        return $this->hasMany(Node::class, 'user_id');
    }
=======
>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c
}
