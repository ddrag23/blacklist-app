<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\RegisterMail;
use Illuminate\Http\Request;
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
            'nama' => 'required',
            'email' => 'required',
            'username' => 'required',
            'notelp' => 'required',
            'alamat' => 'required',
        ]);
        Mail::to($request->email)->send(new RegisterMail($request->all()));
        return back()->with(
            'message',
            'Pendaftaran Berhasil!! Silahkan tunggu email dari kami'
        );
    }
}
