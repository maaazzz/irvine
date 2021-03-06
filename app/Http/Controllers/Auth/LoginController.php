<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('front-end.partials.login');
    }
<<<<<<< HEAD
    public function redirectTo(){
        if(auth()->user()->role==1){
            return redirect('/');
        }
        elseif(auth()->user()->role==2){
            return route('approvals');
        }
        elseif(auth()->user()->role==3){
            return redirect('/');
        }
        else{
=======
    public function redirectTo()
    {
        if (auth()->user()->role == 1) {
            return redirect('/');
        } elseif (auth()->user()->role == 2) {
            return route('approvals');
        } elseif (auth()->user()->role == 3) {
            return redirect('/');
        } else {
>>>>>>> 3d106469a9d1b0f4a5d7b8cb313feae21b767bc5
            return route('admin.index');
        }
    }
}