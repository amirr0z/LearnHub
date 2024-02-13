<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->except(['register', 'login', 'auth']);
        $this->middleware('role:admin')->only(['show']);
    }

    function register()
    {
        return view('user.register');
    }

    function edit()
    {
        return view('user.edit', ['user' => User::findOrFail(Auth::id())]);
    }

    function login()
    {
        return view('user.login');
    }

    function logout()
    {
        Auth::logout();
        return redirect()->route('dashboard');
    }

    function index()
    {
        return view('user.index');
    }

    function show($id)
    {
        return view('user.show', ['user' => User::findOrFail($id)]);
    }

    function create(Request $req)
    {
        $req->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
        ]);

        Auth::login($user);
        return redirect()->route('dashboard');
    }

    function update(Request $req)
    {
        $req->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . Auth::id()],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::findOrFail(Auth::id());
        $user->update([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
        ]);

        return redirect()->route('user.index');
    }

    function auth(Request $req)
    {
        $req->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);


        Auth::attempt(['email' => $req->email, 'password' => $req->password]);
        return redirect()->route('dashboard');
    }
}
