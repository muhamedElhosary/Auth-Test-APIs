<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
class AdminController extends Controller
{
    public function login(Request $request)
    {
        $admin=Admin::where('email',$request->email)->first();
        if(!$admin||($admin->password!=$request->password))
        {
            return response()->json('not authorized',401);
        }
        $token=$admin->createToken('admin-Token',['admin']);
        return response()->json(['token'=>$token->plainTextToken],200);

    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json('logout successfully',401);
    }
}
