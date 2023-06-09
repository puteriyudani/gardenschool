<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin');
    }

    public function showAkun()
    {
        $admins = User::where('level', '0')->get();
        $gurus = User::where('level', '1')->get();
        $ortus = User::where('level', '2')->get();

        return view('admin.akun', compact('admins', 'gurus', 'ortus'));
    }

    public function editAkun(User $user)
    {
        return view('admin.edit',compact('user'));
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
                        ->with('success','Akun updated successfully');
        // $user = User::find(Auth::id());
        // $user->password = Hash::make($request->new_password);
        // $user->save();
        // $request->session()->regenerate();
        // return redirect()->route('showAkun')->with('success', 'Akun updated successfully');
        
    }

    public function destroyAkun(User $user)
    {
        $user->delete();
    
        return back()->with('success','Akun deleted successfully');
    }
}
