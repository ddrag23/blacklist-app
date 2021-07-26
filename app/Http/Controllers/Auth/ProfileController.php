<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
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
            $body['foto'] = $request->file('foto')->store('image/profile');
        }
        $user->where('id', auth()->user()->id)->update($body);
    }
}
