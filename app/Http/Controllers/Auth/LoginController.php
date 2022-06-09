<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/listaProdutos';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(){
        return view('auth.passwords.login');
    }

    public function authenticate(Request $request){
        $creds = $request->only(['email','password']);

        if(Auth::attempt($creds)){
            return redirect()->route("produtos.listaProdutos");
        }
        else{
            return redirect()->route('login')
                ->with('warning', 'E-mail e/ou senha inválidos.');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
