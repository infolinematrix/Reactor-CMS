<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 28/6/17
 * Time: 2:46 PM
 */

namespace Extension\Site\Http\Composer;


use Reactor\Hierarchy\Tags\Tag;
use ReactorCMS\Http\Controllers\Traits\UsesNodeHelpers;

class SiteComposer
{

    use UsesNodeHelpers;

    public function compose($view)
    {

        /**
         * Get Tags
         */
        $tags = Tag::translatedIn(locale())->get();

        $view->with("tags", $tags);
    }


}