<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 5/10/17
 * Time: 3:46 PM
 */

$html .= '';

if (PackageExist('Advertisement')) {
    $html .= '
             <li class="treeview">
                    <a href="' . route("reactor.article.index") . '">
                        <i class="fa fa-ellipsis-h"></i> <span>FAQs</span>
                    </a>
             </li>
            ';
}

