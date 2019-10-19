<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $table = 'info';

    public function users()
    {
        return $this->belongsTo('App\Model\Users', 'user_id', 'id');
    }
}
