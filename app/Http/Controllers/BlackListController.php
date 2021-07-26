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
        return Inertia::render('blacklist/Form', [
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
        $validate = [
            'nama' => 'required',
            'nohp' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'keterangan' => 'required',
        ];
        if (!empty($request->foto)) {
            $validate['foto'] = 'mimes:jpg,jpeg,png';
        }
        if (!empty($request->foto_ktp)) {
            $validate['foto_ktp'] = 'mimes:jpg,jpeg,png';
        }
        $request->validate($validate);
        $body = $request->all();
        $body['user_id'] = auth()->user()->id;
        $blacklist = new BlackList();
        $find = $blacklist->find($body['id']);
        if (!is_null($request->file('foto')) && !is_null($find)) {
            Storage::delete($find->foto);
        }
        if (!is_null($request->file('foto_ktp')) && !is_null($find)) {
            Storage::delete($find->foto_ktp);
        }
        if (!is_null($body['id'])) {
            $body['foto'] = !empty($request->foto)
                ? $request->file('foto')->store('image/foto-blacklist')
                : $find->foto;
            $body['foto_ktp'] = !empty($request->foto_ktp)
                ? $request->file('foto_ktp')->store('image/foto-ktp')
                : $find->foto_ktp;
        } else {
            $body['foto'] = !empty($request->foto)
                ? $request->file('foto')->store('image/foto-blacklist')
                : '';
            $body['foto_ktp'] = !empty($request->foto_ktp)
                ? $request->file('foto_ktp')->store('image/foto-ktp')
                : '';
        }
        $blacklist->updateOrCreate(['id' => $body['id']], $body);
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
        return Inertia::render('blacklist/Detail', [
            'row' => $blackList,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlackList  $blackList
     * @return \Illuminate\Http\Response
     */
    public function edit(BlackList $blackList)
    {
        return Inertia::render('blacklist/Form', [
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
