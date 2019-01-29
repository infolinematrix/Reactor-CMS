<?php

namespace ReactorCMS\Entities;

use ReactorCMS\Support\Database\CacheQueryBuilder;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use CacheQueryBuilder;
    //
    protected $table = 'users_social';
    protected $fillable = [''];
}
