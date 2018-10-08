<?php

namespace ReactorCMS\Entities;

use Illuminate\Database\Eloquent\Builder;
use ReactorCMS\Support\Database\CacheQueryBuilder;
use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    use CacheQueryBuilder;
    //
    protected $table = 'product_order';
    protected $fillable = [''];
}
