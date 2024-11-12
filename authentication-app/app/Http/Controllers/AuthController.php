<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            ],201);
        }else{
            return response()->json([
                'success'=>false,
                'message'=>"User Not Created"
            ],401);
        }
    }

    public function loginUser(Request $request){
        $request->validate([
            'email'=>'required|email|max:100',
            'password'=>'required|string|min:6'
        ]);
        
        if(!Auth::attempt($request->only('email','password'))){
            return response()->json([
                'success'=>false,
                'message'=>"Unauthorized"
            ],401);
        }
        $user = User::where('email',$request->email)->firstorfail();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success'=>true,
            'token'=>$token,
            'message'=>"Login Success"
        ],201);
    }
}
