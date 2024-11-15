<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Sanctum\PersonalAccessToken;
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

    public function getUserInfo(Request $request){
        $user=auth('sanctum')->user();
        return response()->json([
            'user'=>$user
        ]);
    }
    
    public function logoutUser(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'success'=>true,
            'message'=>"Logout Success"
        ],201);
    }
}
