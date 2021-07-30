<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\RegisterMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class RegisterController extends Controller
{
    public function index()
    {
        return Inertia::render('auth/Register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'username' => 'required|min:3',
            'notelp' => 'required|numeric',
            'alamat' => 'required',
            'password' => 'required|confirmed|min:5',
            'password_confirmation' => 'required',
        ]);
        $body = $request->all();
        $body['is_active'] = '1';
        $body['role'] = 'user';
        $body['password'] = Hash::make($request->password);
        User::create($body);
        return back()->with(
            'message',
            'Pendaftaran Berhasil!! Silahkan tunggu email dari kami'
        );
    }
}
