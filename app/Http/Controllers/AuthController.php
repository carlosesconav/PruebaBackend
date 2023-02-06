<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use \stdClass;

class AuthController extends Controller
{

  public function register(Request $request)
  {
    $validator = Validator::make($request->all(), 
     [
       'name' => 'required|string|max:255',
       'email' => 'required|string|email|max:255|unique:users',
       'password' => 'required|string|min:8'
     ]);

    if($validator->fails())
    {
      return response()->json($validator->erros());
    }
    
    $user = User::create(
    [
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password)
    ]);

    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json(['data' => $user,'access_token' => $token, 'token_type' => 'Bearer',]);
  }

  public function login(Request $request)
  {
    if(!Auth::attempt($request->only('email','password')))
    {
      $message = ['message' => 'Unauthorized'];
      return response()->json($message, 401);
    }

    $user = User::where('email', $request['email'])->firstOrFail();
    $token = $user->createToken('auth_token')->plainTextToken;

    $message = 
    [
      'message' => 'WELCOME USER',
      'accessToken' => $token,
      'token_type' => 'Bearer',
      'user' => $user
    ];

    return response()->json($message);
  }

  public function logout()
  {
    auth()->user()->tokens()->delete();
    $message = 
    [
      'message' => 'The token has been deleted'
    ];

    return response()->json($message);
  }

}