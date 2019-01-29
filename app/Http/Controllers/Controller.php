<?php

namespace ReactorCMS\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
<<<<<<< HEAD

    /**
     * Compiles view for display
     *
     * @param string $view
     * @param array $parameters
     * @param string $title
     * @return view
     */


    public function getHome(){

       return view('index');
    }
=======
>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c
}
