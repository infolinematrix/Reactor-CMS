<?php

namespace ReactorCMS\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Validator;
use ReactorCMS\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo;

    protected $maxLoginAttempts = 2; // Amount of bad attempts user can make
    protected $lockoutTime = 1;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

        $this->redirectTo = route('reactor.dashboard');
    }

<<<<<<< HEAD
    public function index()
    {
      # code...
      return "ERRORRRR";
    }
=======

>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c
    protected function guard()
    {
        return Auth::guard('admin');
    }

<<<<<<< HEAD
    protected function refresh()
      {
        return response([
          'status' => 'success'
        ]);
      }
=======
>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c
    
}
