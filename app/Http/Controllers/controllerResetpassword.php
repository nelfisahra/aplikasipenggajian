<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class ControllerResetPasswordAdmin extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('admin.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['username' => 'required|exists:admin,username']);

        // Proses pengiriman token reset password (custom)
        return back()->with('success', 'Link reset password telah dikirim!');
    }

    public function showResetForm($token)
    {
        return view('admin.reset-password', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:admin,username',
            'password' => 'required|min:6|confirmed',
        ]);

        $admin = Admin::where('username', $request->username)->first();
        $admin->password = Hash::make($request->password);
        $admin->save();

        return redirect()->route('admin.login')->with('success', 'Password berhasil direset.');
  }
}