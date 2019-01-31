<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 30/10/18
 * Time: 5:33 PM
 */

namespace Matrix\Locations\Http\Traits;


use ReactorCMS\Entities\Node;
use ReactorCMS\Entities\NodeMeta;

trait UseLocation
{

    public $locationType = 'locations';

    protected function getPopularLocations($order='DESC',$limit = 100){

        $nodes = Node::WhereExtensionAttribute($this->locationType, 'popular', 1)
            ->translatedIn(locale());

        return $nodes;
    }
    
    
}