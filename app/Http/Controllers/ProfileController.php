<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showProfile()
    {
        $user = Auth::user();
        return view('showProfile', compact('user'));
    }

    public function editProfile(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'password' => 'required|min:8|confirmed'
        ]);

        $user = Auth::user();
        $user->update([
            'name' => $req->name,
            'password' => Hash::make($req->password)
        ]);

        return Redirect::back();
    }
}
