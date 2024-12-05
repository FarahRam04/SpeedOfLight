<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'phone_number'=>['required','unique:users,phone_number'],
            'password'=>'required|confirmed|min:8',
        ]);
        $user=User::create([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'phone_number'=>$request->phone_number,
            'password'=>$request->password,
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;
        Auth::login($user);
        return response()->json([
            'message'=>'User Registered successfully',
            'user'=>Auth::user(),
            'token'=>$token,
        ]);

    }
    public function login(Request $request)
    {
        $request->validate([
            'phone_number' => 'required',
            'password' => 'required|string|min:8',
        ]);
        if (!Auth::attempt($request->only('phone_number', 'password'))) {
            return response()->json(['message' => 'Invalid phone_number or password'], 401);
        }

        $user=User::where('phone_number',$request->phone_number)->FirstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'message' => 'Login successfully',
            'user'=>Auth::user(),
            'token'=>$token
        ]);

    }
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Logout successfully',
        ]);
    }
}
