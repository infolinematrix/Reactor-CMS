<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 30/10/18
 * Time: 5:33 PM
 */

namespace Matrix\Categories\Http\Traits;


use ReactorCMS\Entities\Node;

trait UseCategory
{

    public $nodeType = 'categories';

    protected function getCategories($parent=null, $order='DESC'){


        $nodes = Node::withType($this->nodeType)
            ->where('parent_id', $parent)
            ->translatedIn(locale());

        return $nodes;
    }
}