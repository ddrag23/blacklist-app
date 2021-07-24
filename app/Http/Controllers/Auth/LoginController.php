<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function index()
    {
        return Inertia::render('auth/Login');
    }

    public function authentication(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $user = User::where('username', $request->username)->first();
        if ($user) {
            if (
                Auth::attempt([
                    'username' => $request->username,
                    'password' => $request->password,
                ]) &&
                Hash::check($request->password, $user->password)
            ) {
                if ($user->is_active === '1') {
                    return redirect('/blacklist')->with([
                        'message' => 'Selamat datang di aplikasi blacklist',
                    ]);
                } else {
                    return redirect('/login')->with([
                        'message' =>
                            'Akun anda sudah tidak aktif, silahkan hubungi admin',
                    ]);
                }
            } else {
                return redirect('/login')->with([
                    'message' => 'Password yang anda masukkan salah',
                ]);
            }
        } else {
            return redirect('/login')->with([
                'message' => 'Username yang anda masukkan salah',
            ]);
        }
    }
}
