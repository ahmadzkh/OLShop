<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';
    protected $username;

    public function __construct() {
        $this->middleware('guest')->except('logout');
        $this->username = $this->findUsername();
    }

    public function findUsername()
    {
        $login = request()->input('login');

        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        request()->merge([$fieldType => $login]);

        return $fieldType;
    }

    public function username()
    {
        return $this->username;
    }

    /**
     * Halaman Login
     */
    public function index()
    {
        return view('auth/login');
    }

    /**
     * Proses Login
     */
    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'login'    => 'required',
            'password' => 'required',
        ]);

        $login_type = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL )
            ? 'email'
            : 'username';

        $request->merge([
            $login_type => $request->input('login')
        ]);

        $user = User::where($login_type, $request->login)->first();
        $user = $user;

        if ($user != null) {
            if (Auth::attempt($request->only($login_type, 'password'))) {
                /**
                 * Login dengan level admin
                 */
                if ($user->level === 'Admin') {
                    // dd(auth()->user()->level);
                    return redirect()->route('admin.home');
                }

                /**
                 * Login dengan level pembeli
                 */
                else if ($user->level === 'Customer') {
                    return redirect()->route('alumni.home');
                }
            }
        }

        return redirect()->back()
            ->withInput()
            ->with('login', 'These credentials do not match our records.');
    }

    /**
     * Regist
     */
    public function register()
    {
        return view('auth.register');
    }

    /**
     * Function Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}