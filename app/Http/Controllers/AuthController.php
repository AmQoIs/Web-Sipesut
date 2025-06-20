<?php

namespace App\Http\Controllers;

use App\Constants\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function index()
    {
        return view('pages.guest.login');
    }

    public function login(Request $request)
    {
        $messages = [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email harus berupa alamat email yang valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password harus minimal 8 karakter.',
        ];

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ], $messages);

        $user = User::where('email', '=', $request->email)->where('is_deleted', false)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('userId', $user->id);
                Auth::login($user, $request->has('remember_me'));
                if (Auth::check()) {
                    if (($user->role === Roles::ADMIN) || ($user->role === Roles::ADMIN_MUTLAK)) {
                        return redirect()->route('admin');
                    } else { // role anggota
                        return redirect()->to('/');
                    }
                }
            } else {
                return back()->with('wrongpassword', 'Password yang dimasukkan tidak sesuai');
            }
        } else {
            return back()->with('fail', 'Akun tidak terdaftar');
        }
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }
}
