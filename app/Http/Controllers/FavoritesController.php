<?php

namespace App\Http\Controllers;

use App\Models\Favorites;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{

    public function index()
    {
        $mensaje = favorites::all();
        return response()->json($mensaje, 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Favorites $favorites)
    {
        //
    }

    public function edit(Favorites $favorites)
    {
        //
    }

    public function update(Request $request, Favorites $favorites)
    {
        //
    }

    public function destroy(Favorites $favorites)
    {
        //
    }
}
