<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nohp' => 'required|unique:users',
            'password' => 'required',
            'confirmpassword' => 'required|same:password',
            'level' => 'required',
        ]);

        $user = new User([
            'name' => $request->name,
            'nohp' => $request->nohp,
            'password' => Hash::make($request->password),
            'level' => $request->level,
        ]);
        $user->save();

        return redirect()->route('login')->with('success', 'Registration success. Please login!');
    }

    public function login()
    {
        return view('login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'nohp' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['nohp' => $request->nohp, 'password' => $request->password])) {
            // Simpan nama pengguna dalam sesi
            $request->session()->put('name', Auth::user()->name);

            // Memperbarui waktu login terakhir user
            User::updateLastLogin(Auth::user()->id);

            if (Auth::user()->level == 'admin') {
                return redirect()->route('admin');
            } else if (Auth::user()->level == 'guru') {
                return redirect()->route('teacher.index');
            } else if (Auth::user()->level == 'ortu') {
                return redirect()->route('ortu');
            } else {
                return redirect()->route('register');
            }
        } else {
            return back()->withErrors([
                'password' => 'Wrong nohp or password',
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}
