<?php 

namespace Unicorn\Author\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model{
    /**
     * @var string 
     */
    protected $table = '_role';
    /**
     * @var array 
     */
    protected $fillable = ['name'];

}