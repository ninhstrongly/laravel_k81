<?php 
namespace Botble\Demo\Models;
use Illuminate\Database\Eloquent\Model;
class Demo_code extends Model
{
    /**
     * @var string 
     */
    protected $table = 'demo_core';
    /**
     * @var array 
     */
    protected $fillable = ['name','test_core'];
}