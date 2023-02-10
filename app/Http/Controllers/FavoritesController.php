<?php

namespace App\Http\Controllers;

use App\Models\Favorites;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class FavoritesController extends Controller
{
    public function index($id)
    {
        $user = User::findOrFail($id);
        $data = Favorites::all()->where('id_user',"=",$user->id);
        return response()->json($data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
      $data = request()->except('_token');
      $message = 
      [
        'message' => 'Data saved successfully',
        'status' => 200
      ];
      Favorites::insert($data);
      return response()->json([$message, $data]);
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

    public function destroy($id)
    {
     $message = 
     [
      'message' => 'The data has been deleted',
      'status' => 200
     ];  
      $data= Favorites::findOrFail($id);
      Favorites::destroy($id);  
      
      return response()->json($message);
    }
}