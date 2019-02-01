<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 1/12/17
 * Time: 6:58 PM
 */

namespace ReactorCMS\Entities;

use Illuminate\Database\Eloquent\Builder;
use Plank\Metable\Metable;

class Node extends \Reactor\Hierarchy\Node
{
    //use CacheQueryBuilder;


   

    public function media()
    {
        return $this->hasMany('ReactorCMS\Entities\Media', 'node_id');
    }

    

    public function scopeWithTitle(Builder $query, $name, $locale = null)
    {
        return $this->scopeWhereTranslationLike($query, 'title', $name, $locale);
    }


}