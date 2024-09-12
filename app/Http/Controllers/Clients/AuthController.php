<?php

namespace App\Http\Controllers\Clients;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $user;
    protected $cart;
    public function __construct(User $user, Cart $cart)
    {
        $this->user = $user;
        $this->cart = $cart;
    }
    public function loginForm()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }

        return view('clients.auths.login');
    }
    public function login(Request $request)
    {
        $user = $request->all([
            'email',
            'password',
        ]);
        if (Auth::attempt($user)) {
            $role = Auth::user()->role_id;
            if ($role == 1) {
                return redirect()->route('home');
            } else {
                return redirect('/admin');
            }
        }

        return redirect()->back()->withErrors([
            'message' => 'User information is incorrect',
        ])->withInput();

    }
    public function registerForm()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }

        return view('clients.auths.register');
    }
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $user = $this->user->create($data);
        $this->cart->create(['user_id' => $user->id]);
        Auth::login($user);

        return redirect()->route('home');


    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login-form');
    }
}
