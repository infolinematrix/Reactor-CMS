<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 22/10/18
 * Time: 2:40 PM
 */

namespace ReactorCMS\Http\Controllers\Auth;



use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Reactor\Hierarchy\NodeType;
use ReactorCMS\Entities\Node;
use ReactorCMS\Http\Controllers\Controller;
use ReactorCMS\Http\Controllers\PublicController;
use ReactorCMS\Http\Controllers\Traits\UsesNodeHelpers;
use Alert;
use ReactorCMS\Entities\User;
use Reactor\Users\Role;
use App\Events\RegisterEvent;
use App\Events\ForgotPasswordEvent;
use UxWeb\SweetAlert\SweetAlert;
use extension\Site\Helpers\UseAppHelper;

class UserController extends Controller
{

    use AuthenticatesUsers;
    use UsesNodeHelpers;
    use UseAppHelper;

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

        $this->redirectTo = route('user.dashboard');
    }

    public function index(){

        return $this->compileView('Site::auth.login', compact('home'),'HOME PAGE TITLE');
    }


    public function dashboard(){

        $user = Auth::guard('web')->user();
        $node = $user->nodes()->withType('profile')->first();

        if(!$node){
            return redirect()->route('member.profile');
        }


        $isProfile = $node->profile_firstname.' '.$node->profile_lastname;
        $profileImage = $node->media()->where('type','image')->first();

        
        $appointments = $node->appointment()->orderBy('confirmed','yes')->get();

        return $this->compileView('Site::member.dashboard', compact('isProfile','profileImage','node_count','appointments'), 'USER PANEL');
    }

    public function profile(){

        $profile = Auth::user();


        $isProfile = $profile->nodes()->withType('businesstype')->first();
        if($isProfile){
            $isProfile = $this->check_business_exist();
        }else{

            $isProfile = null;
        }


        

        return $this->compileView('Site::auth.profile', compact('profile','isProfile'), 'USER PROFILE');
    }


    public function logout(Request $request)
    {
        $this->guard('web')->logout();
        return redirect()->route('login');
    }

    public function getRegister(){

        return $this->compileView('Site::auth.register', compact(''), 'Register');
    }

    public function postRegister(Request $request){


        /*Check User EXIST*/
        $check_user = User::where('email', $request->email)->first();
        if (!$check_user) {
            $user_role = Role::where('name', 'PUBLICUSER')->first();

            /*SAVE TO DATABASE*/

            $data = [

                'type' => $request->type,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => $request->password,
                'status' => 1
            ];

            $user = User::create($data);

            //--Assign Role
            $user->assignRoleById($user_role->id);

            /*Event Running*/
            Event::fire(new RegisterEvent($user));

            SweetAlert::message('Please check your email, we have send you a activation code')->autoclose(4000);;
            return redirect()->back();
        }else{

            SweetAlert::message('Email Already Exist!')->autoclose(4000);
            return redirect()->back();

        }
    }

    public function verify($email=''){

        $email = base64_decode($email);

        User::where('email',trim($email))->update(['status' => 51]);

        SweetAlert::message('Account activated! Please login...')->autoclose(4000);
        return redirect()->route('login');

    }


    public function getForgot(){


        return $this->compileView('Site::auth.forgotpassword', compact('profile'), 'Forgot Password');
    }

    public function postForgot(Request $request){


        $check_user = User::where('email', $request->email)->first();

        if (!$check_user) {

            SweetAlert::message('Invalid Email!');
            return redirect()->back();
        }else{

            $email = $request->email;

            /*Event Running*/
            Event::fire(new ForgotPasswordEvent($email));

            SweetAlert::message('Please check your mail...')->autoclose(4000);
            return redirect()->back();

        }
    }

    public function resetPassword($email=''){

        $email = base64_decode($email);

        return $this->compileView('Site::auth.reset', compact('email'), 'Reset Password');
    }

    public function postRestepassword(Request $request){

        $email = trim($request->email);
        $data = [

            'password' => Hash::make($request->password)
        ];


        User::where('email',$email)->update($data);

        SweetAlert::message('Password Changed! Please login...')->autoclose(4000);;
        return redirect()->back();


    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('web');
    }

}