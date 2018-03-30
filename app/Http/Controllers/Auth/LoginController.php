<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $loginView;

    // protected $username = 'login';

    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);

        // $this->loginView = 'site.login';
    }

    public function username()
    {
    return 'login';
    }



    // public function showLoginForm()
    // {
    //     // $view = property_exists($this, 'loginView') ? $this->loginView : '';

    //     // if (view()->exists($view)) {
    //     //     return view($view)->with('title','Site Login');
    //     // }
    //     // abort(404);
    //     return view('site.login');

    // }
}
