<?php

namespace ReactorCMS\Entities;

use Illuminate\Database\Eloquent\Builder;
<<<<<<< HEAD

=======
use ReactorCMS\Support\Database\CacheQueryBuilder;
>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c
use Illuminate\Database\Eloquent\Model;


class NodeMeta extends Model
{
<<<<<<< HEAD

=======
    use CacheQueryBuilder;
>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c

    public $timestamps = false;
    protected $table = 'node_meta';

    //

    protected $fillable = ['node_id', 'type', 'key', 'value'];


    public function nodes()
    {
        return $this->hasOne(Node::class, 'id');
    }

    public function scopeByKey(Builder $query, $key)
    {
        return $query->where($this->table . '.key', $key);
    }

<<<<<<< HEAD
=======

>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c
}
