<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 4/4/17
 * Time: 12:42 PM
 */


use ReactorCMS\Entities\NodeMeta;
use Reactor\Documents\Media\Media;

use ReactorCMS\Entities\Node;
use ReactorCMS\Entities\Settings;

//use App\Support\Database\CacheQueryBuilder;


/*Get Mail Confriguration*/

if (!function_exists('getMailconfig')) {

    function getMailconfig()
    {
        $config = [
            'driver' => getSettings('email_driver'),
            'host' => getSettings('email_host'),
            'port' => getSettings('email_port'),
            'from' => [
                'address' => getSettings('email_from_email'),
                'name' => config('application.company.title')],
            'encryption' => getSettings('email_encryption'),
            'username' => getSettings('email_user'),
            'password' => getSettings('email_password'),
            'sendmail' => '/usr/sbin/sendmail -bs',
            'pretend' => false,
        ];

        return $config;

    }
}

/*Get Settings*/

if (!function_exists('getSettings')) {

    function getSettings($variable = '')
    {

        //$settings = Settings::where('variable', $variable)->first();
        $settings = Cache::rememberForever('settings_' . $variable, function () use ($variable) {
            return Settings::where('variable', $variable)->first();
        });

        if ($settings) {
            return $settings->value;
        } else {

            return false;
        }

    }
}


/*Get Banners*/

if (!function_exists('getBanner')) {

    function getBanner($size = '', $limit = 1)
    {

        //--GET NODES FOR MEDIA (SUBHA )

        $banners = Node::WhereExtensionAttribute('banners', 'banner_size', $size)
            ->translatedIn(locale())
            ->take($limit)
            ->get();

        if (count($banners) > 0) {

            if (count($banners) > 1) {
                $media = '';
                foreach ($banners as $node) {
                    $path = $node->media->first()->path;
                    $asset = asset('public/uploads/' . $path);
                    $media .= "<div class='item'><img src='$asset' alt='Banner'></div>";
                }

                return $media;

            } else {
                $banner = $banners[0]->media->first()->path;
                return $banner;
            }
        }

        return false;

    }
}

if (!function_exists('getArticles')) {

    function getArticles($limit = 3)
    {
        $nodes = Node::withType('articletype')
            ->limit($limit)
            ->translatedIn(locale())
            ->sortable('id', 'DESC')
            ->get();

        return $nodes;
    }
}

if (!function_exists('getFeaturedproducts')) {

    function getFeaturedproducts()
    {

        $featured_products = Node::withtype('producttype')
            ->Join('promotions as PM', 'PM.node_id', '=', 'nodes.id')
            ->where('PM.expired_on', '>=', date('Y-m-d'))
            ->take(10)
            ->get();

        if (count($featured_products) > 0) {

            foreach ($featured_products as $products) {

                $nodeIds[] = $products->node_id;
            }

            $featured_product = Node::whereIn('id', $nodeIds)->published()->get();

            foreach ($featured_product as $product) {

                $pro[] = [

                    'title' => $product->getTitle(),
                    'slug' => $product->getName(),
                    'currency' => $product->product_currency,
                    'price' => $product->product_price,
                    'moq' => $product->product_moq . ' ' . $product->product_unit,
                    'image' => $product->media()->where('type', 'image')->first(),
                ];


            }
            $featured_products = $pro;
        } else {
            $featured_products = null;
        }

        return $featured_products;
    }
}

if (!function_exists('CountTraders')) {

    function CountTraders()
    {

        $nodes = Node::withType('businesstype')->published()->count();

        return $nodes;

    }

}

if (!function_exists('CountProducts')) {

    function CountProducts()
    {

        $node = Node::withType('producttype')->published()->count();

        return $node;
    }
}