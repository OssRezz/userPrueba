<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    public function login(Request $request, User $user)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = request()->only('email', 'password');

        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();
            return redirect('usuarios');
        } else {
            return redirect()->back()->with('message', 'Las crendenciales son incorrectas');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->to('/')->with('message', 'La sesion se ha cerrado con exito!');
    }
}
