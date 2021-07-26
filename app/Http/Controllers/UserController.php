<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('user/Index', [
            'users' => User::latest('id')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('user/Form', [
            'title' => 'Tambah data',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'username' => 'required|min:3',
            'email' => 'required|email',
            'notelp' => 'required',
            'role' => 'required',
            'jenis_kelamin' => 'required',
            'is_active' => 'required',
            'alamat' => 'required',
        ];
        if ($request->has('password') && !empty($request->password)) {
            $rules['password'] = 'confirmed|min:3';
        }
        $request->validate($rules);
        $user = new User();
        $body = $request->all();
        $body['password'] = !empty($request->password)
            ? Hash::make($request->password)
            : $user->find($request->id)->password;
        $user->updateOrCreate(['id' => $body['id']], $body);
        return back()->with('message', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return Inertia::render('user/Detail', [
            'row' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return Inertia::render('user/Form', [
            'row' => $user,
            'title' => 'Edit data',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('message', 'Data berhasil dihapus');
    }
}
