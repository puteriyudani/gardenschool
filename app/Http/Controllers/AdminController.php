<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::where('level', '0')->count();
        $gurus = User::where('level', '1')->count();
        $ortus = User::where('level', '2')->count();
        $siswas = Siswa::count();
        return view('admin', compact('admins', 'gurus', 'ortus', 'siswas'));
    }

    public function indexAdmin()
    {
        $admins = User::where('level', '0')->paginate(10);
        return view('akun.admin', compact('admins'));
    }

    public function indexGuru()
    {
        $gurus = User::where('level', '1')->paginate(10);
        return view('akun.guru', compact('gurus'));
    }

    public function indexOrtu()
    {
        $ortus = User::where('level', '2')->paginate(10);
        return view('akun.ortu', compact('ortus'));
    }

    public function editAkun(User $user)
    {
        return view('admin.edit', compact('user'));
    }

    public function updateAkun(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'nohp' => 'required',
            // 'old_password' => [
            //     'required',
            //     function ($attribute, $value, $fail) use ($user) {
            //         if (!Hash::check($value, $user->password)) {
            //             $fail('The old password is incorrect.');
            //         }
            //     },
            // ],
            // 'new_password' => 'required|confirmed',
        ]);

        $user->update($request->all());

        return redirect()->route('showAkun')
            ->with('success', 'Akun updated successfully');
        // $user = User::find(Auth::id());
        // $user->password = Hash::make($request->new_password);
        // $user->save();
        // $request->session()->regenerate();
        // return redirect()->route('showAkun')->with('success', 'Akun updated successfully');

    }

    public function destroyAkun(User $user)
    {
        $user->delete();

        return back()->with('success', 'Akun deleted successfully');
    }
}
