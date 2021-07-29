<?php

namespace App\Http\Controllers;

use App\Models\BlackList;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PublicController extends Controller
{
    public function index()
    {
        return Inertia::render('guest/LandingPage');
    }

    public function searchPeople()
    {
        return Inertia::render('guest/SearchPeople');
    }

    public function storeSearch(Request $request)
    {
        return response()->json(
            BlackList::where(
                'nama',
                'like',
                '%' . $request->search . '%'
            )->get()
        );
    }
}
