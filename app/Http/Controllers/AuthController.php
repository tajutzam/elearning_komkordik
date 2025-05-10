<?php

namespace App\Http\Controllers;

use App\Models\MahasiswaProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    public function login()
    {
        return view('login');
    }


    public function loginPost(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            session()->flash('success', 'Login berhasil!');

            $user = Auth::user();

            if ($user->role == 'mahasiswa') {
                return redirect()->intended('/home');
            } else {
                return redirect()->intended('/dashboard');
            }
        }

        session()->flash('error', 'Email atau password salah.');

        return back()->withInput();
    }

    public function register()
    {
        return view('register');
    }


    public function registerPost(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8',
                'name' => 'required',
                'nim' => 'required|unique:mahasiswa_profiles,nim',
                'asal_kampus' => 'required',
                'unit_kerja' => 'required'
            ]
        );

        $user = User::create(
            [
                'role' => 'mahasiswa',
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'name' => $request->input('name'),
            ]
        );

        MahasiswaProfile::create(
            [
                'nim' => $request->input('nim'),
                'asal_kampus' => $request->input('asal_kampus'),
                'unit_kerja' => $request->input('unit_kerja'),
                'user_id' => $user->id
            ]
        );

        return redirect()->route('login')->with('success', 'berhasil daftar!');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login')->with('success', 'berhasil logout!');
    }



}
