<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 28/6/17
 * Time: 2:46 PM
 */

namespace Extension\Site\Http\Composer;


use Illuminate\Support\Facades\File;
use Matrix\Advertisement\SkeletonClass;

class AdminMenuComposer
{


    public function compose($view)
    {
        $view->with("admin_menu", $this->menu());
        $view->with('admin_package_menu', $this->admin_package_menu());
        //$view->with('admin_vendor_package_menu', $this->admin_matrix_package_menu());
    }

    public function admin_matrix_package_menu()
    {

        /*$vendor_path = base_path('packages/Matrix');
        $list = File::directories($vendor_path);



        foreach ($list as $package_path) {

            $contents = $package_path;
            dd($contents);
            //require $package_name;
        }*/

    }

    public function admin_package_menu()
    {
        $html = '';

        if (PackageExist('Article')) {
            $html .= '
             <li class="treeview">
                    <a href="' . route("reactor.article.index") . '">
                        <i class="fa fa-edit"></i> <span>Article</span>
                    </a>
             </li>
            ';
        }

        if (PackageExist('Locations')) {
            $html .= '
             <li class="treeview">
                    <a href="' . route("reactor.location.index") . '">
                        <i class="fa fa-map-marker"></i> <span>Locations</span>
                    </a>
             </li>
            ';
        }

        if (PackageExist('Categories')) {
            $html .= '
             <li class="treeview">
                    <a href="' . route("reactor.category.index") . '">
                        <i class="fa fa-list"></i> <span>Category</span>
                    </a>
             </li>
            ';
        }


        if (PackageExist('Advertisement')) {
            $html .= '
             <li class="treeview">
                    <a href="' . route("reactor.advertisement.create") . '">
                        <i class="fa fa-image"></i> <span>Advertisement</span>
                    </a>
             </li>
            ';
        }

        if (PackageExist('Payment')) {
            $html .= '
             <li class="treeview">
                    <a href="' . route("reactor.payment.index") . '">
                        <i class="fa fa-image"></i> <span>Payment Gateways</span>
                    </a>
             </li>
            ';
        }

        if (PackageExist('Faq')) {
            $html .= '
             <li class="treeview">
                    <a href="' . route("reactor.faq.index") . '">
                        <i class="fa fa-question"></i> <span>FAQs</span>
                    </a>
             </li>
            ';
        }

        if (PackageExist('Pages')) {
            $html .= '
             <li class="treeview">
                    <a href="' . route("reactor.pages.index") . '">
                        <i class="fa fa-newspaper-o"></i> <span>Pages</span>
                    </a>
             </li>
            ';
        }

        if (PackageExist('Reviews')) {
            $html .= '
             <li class="treeview">
                    <a href="' . route("reactor.reviews.index") . '">
                        <i class="fa fa-newspaper-o"></i> <span>Reveiws</span>
                    </a>
             </li>
            ';
        }

        return $html;
    }


    public function menu()
    {

        $html = "";

        $html .= '

         <li class="treeview">
                <a href="' . route("reactor.company.index") . '">
                    <i class="fa fa-vcard-o text-primary"></i> <span>Company</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
         </li>
            
         <li class="treeview">
                <a href="' . route("reactor.product.all") . '">
                    <i class="fa fa-server text-primary"></i> <span>Product</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
         </li>


            
         <li class="treeview">
                <a href="' . route('reactor.plan.index') . '">
                    <i class="fa fa-cc text-primary"></i> <span>Plan</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
         </li>

         <li class="treeview">
                <a href="' . route('reactor.messages.index') . '">
                    <i class="fa fa-envelope-o text-primary"></i> <span>Messages</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
         </li>

        ';

        return $html;
    }
}