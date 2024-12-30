<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegisterUserRequest $request)
    {
        $user=User::create($request->validated());
        $token = $user->createToken('auth_token for'. $user->first_name,
        ['*'],now()->addDays(10))->plainTextToken;
        Auth::login($user);
        return response()->json([
            'message'=>'User Registered successfully',
            'user'=>Auth::user(),
            'token'=>$token,
        ]);

    }
    public function login(LoginUserRequest $request)
    {

        if (!Auth::attempt($request->only('phone_number', 'password'))) { //attempt to authenticate the user=>Auth::user = this user
            return response()->json(['message' => 'Invalid phone_number or password'], 401);
        }

        $user=User::where('phone_number',$request->phone_number)->FirstOrFail();
        $token = $user->createToken('auth_token for' . $user->first_name,
        ['*'],now()->addDays(10))->plainTextToken;
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
    public function uploadImage(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $imagePath = $request->file('image')->store('images', 'public');
        $user=User::find(Auth::id());
        $user->image=asset('storage/' . $imagePath);
        $user->save();

        return response()->json(['message'=>'Image uploaded successfully','path'=>$user->image]);
    }
}
