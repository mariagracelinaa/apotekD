<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

// Week 13
use Auth;

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

    //  Mengatur setelah login mau dituju ke halaman mana
    // protected $redirectTo = RouteServiceProvider::HOME;
    // protected $redirectTo = "/suppliers";

    // Week 13
    public function redirectTo() {
        $role = Auth::user()->sebagai;
        switch ($role) {
            case 'owner';
                return '/suppliers';
                break;
            case 'pegawai';
                return '/medicines';
                break;
            case 'member';
                return '/';
                break;
            
            default:
                return '/home';
            break;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
