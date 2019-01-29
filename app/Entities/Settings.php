<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 23/8/17
 * Time: 1:37 PM
 */

namespace ReactorCMS\Entities;

<<<<<<< HEAD
use ReactorCMS\Support\Database\CacheQueryBuilder;
=======
>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
<<<<<<< HEAD
    //use CacheQueryBuilder;

=======
>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c
    protected $table = 'settings';
    protected $fillable = ['variable', 'value'];
}