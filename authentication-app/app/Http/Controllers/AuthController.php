<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function registerUser(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|max:100|unique:users',
            'password'=>'required|string|min:6|confirmed'
        ]);

        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password
        ]);
        if($user!=null){
            return response()->json([
                'success'=>true,
                'message'=>"User Created Successfully"
            ]);
        }else{
            return response()->json([
                'success'=>false,
                'message'=>"User Created Successfully"
            ]);
        }
    }
}
