<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', [
            'except' => [
                'login',
                'register'
            ]
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $token = Auth::guard('api')->login($user);

        return response()->json([
            'status' => 'success',
            'message' => 'User registered successfully',
            'user' => $user,
            'token' => $token
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($token = Auth::guard('api')->attempt($credentials)) {
            $user = Auth::guard('api')->user();

            return response()->json([
                'status' => 'Success',
                'message' => 'Logged in successfully',
                'name' => $user->name,
                'id' => $user->id,
                'token' => $token
            ]);
        } else {
            return response()->json([
                'status' => 'Error',
                'message' => 'Login Failed'
            ]);
        }
    }
}


//     public function login(Request $request)
// {
//     $credentials = $request->only('email', 'password');

//     if ($token = auth()->attempt($credentials)) {
//         return response()->json(['token' => $token]);
//     } else {
//         return response()->json(['error' => 'Unauthorized'], 401);
//     }
// }
