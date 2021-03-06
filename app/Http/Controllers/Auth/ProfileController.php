<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function index()
    {
        return Inertia::render('auth/Profile', [
            'user' => User::find(auth()->user()->id),
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'username' => 'required|min:3',
            'email' => 'required|email',
            'notelp' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
        ];
        if (!empty($request->foto)) {
            $rules['foto'] = 'mimes:jpg,jpeg,png';
        }
        $request->validate($rules);
        $body = $request->all();
        $user = new User();
        $find = $user->find(auth()->user()->id);
        if (!empty($request->file('foto') && !empty($find->foto))) {
            Storage::delete($find->foto);
            $body['foto'] = $request->file('foto')->store('image/profile');
        } else {
            $body['foto'] = !empty($request->foto)
                ? $request->file('foto')->store('image/profile')
                : '';
        }
        $user->where('id', auth()->user()->id)->update($body);
        return back()->with('message', 'Data profile berhasil disimpan');
    }
    public function changePassword()
    {
        return Inertia::render('auth/ChangePassword');
    }

    public function storeChangePassword(Request $request)
    {
        $userSession = auth()->user();
        $request->validate([
            'old_password' => [
                'required',
                function ($attribute, $value, $fail) use ($userSession) {
                    if (!Hash::check($value, $userSession->password)) {
                        $fail('Password Lama Tidak Cocok');
                    }
                },
            ],
            'new_password' => 'required|same:password_confirmation',
            'password_confirmation' => 'required',
        ]);
        User::where('id', $userSession->id)->update([
            'password' => Hash::make($request->new_password),
        ]);
        return response()->json([
            'success' => $request->all(),
            'message' => 'Data berhasil dimasukkan',
        ]);
    }
}
