<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';

    public function roles()
    {
        return $this->belongsToMany('App\Model\Role', 'role_user', 'user_id', 'role_id');
    }
}
