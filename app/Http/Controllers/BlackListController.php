<?php

namespace App\Http\Controllers;

use App\Models\BlackList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class BlackListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('blacklist/Index', [
            'blacklist' => BlackList::latest('id')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('blacklist/Create', [
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
        $request->validate([
            'foto' => 'mimes:jpg,jpeg,png',
            'foto_ktp' => 'mimes:jpg,jpeg,png',
            'nama' => 'required',
            'nohp' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'keterangan' => 'required',
        ]);
        $body = $request->all();
        $body['user_id'] = auth()->user()->id;
        BlackList::updateOrCreate(['id' => $body['id']], $body);
        return back()->with('message', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlackList  $blackList
     * @return \Illuminate\Http\Response
     */
    public function show(BlackList $blackList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlackList  $blackList
     * @return \Illuminate\Http\Response
     */
    public function edit(BlackList $blackList)
    {
        return Inertia::render('blacklist/Create', [
            'row' => $blackList,
            'title' => 'Edit data',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlackList  $blackList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlackList $blackList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlackList  $blackList
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlackList $blackList)
    {
        Storage::delete([$blackList->foto, $blackList->foto_ktp]);
        $blackList->delete();
        return back()->with('message', 'Data berhasil dihapus');
    }
}
