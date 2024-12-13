<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
class UserController extends Controller
{
    public function login(Request $request)
    {
        $user=User::where('email',$request->email)->first();
        if(!$user||($user->password!=$request->password))
        {
            return response()->json('not authorized',401);
        }
        $token=$user->createToken('Token',['user']);
        return response()->json(['token'=>$token->plainTextToken],200);

    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json('logout successfully',401);
    }
}
