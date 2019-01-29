<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 1/12/17
 * Time: 6:58 PM
 */

namespace ReactorCMS\Entities;

use Illuminate\Database\Eloquent\Builder;

class Node extends \Reactor\Hierarchy\Node
{
    //use CacheQueryBuilder;


<<<<<<< HEAD
=======
    /**
     * Returns the node name
     *
     * @return string
     */
    public function getName()
    {
        return $this->translateOrFirst()->node_name;
    }

>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c
    public function meta()
    {
        return $this->hasMany('ReactorCMS\Entities\NodeMeta', 'node_id');
    }

    public function media()
    {
        return $this->hasMany('ReactorCMS\Entities\Media', 'node_id');
    }

<<<<<<< HEAD
    
=======
    public function reviews()
    {
        return $this->hasMany('Matrix\Reviews\NodeMeta', 'node_id');
    }
>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c

    public function scopeWithTitle(Builder $query, $name, $locale = null)
    {
        return $this->scopeWhereTranslationLike($query, 'title', $name, $locale);
    }


}