<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show()
    {
        //
    }

    public function edit($id)
    {
      $user = User::findOrFail($id);
      return response()->json($user, 200);
    }

    public function update(Request $request, $id)
    {
      $user = request()->except(['_token', '_method']);

      if($user)
      {
        User::where('id','=',$id)->update($user);
        $message = 
        [
          "message" => "The user has been updated"
        ];
        return response()->json($message,200);
      }
      else
      {
        return response()->json(["message" => "Bad Request"], 400);
      }
    }

    public function destroy(Favorites $favorites)
    {
        //
    }
}