<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registrationPage()
    {
        return view('auth.registration');
    }
    public function loginPage()
    {
        return view('auth.login');
    }

    //api routing
    public function registration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:App\Models\User,email',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (!Auth::attempt($credentials)) {
            return response([
                'message' => 'Bad login', 401
            ]);
        }
        $user = User::where('email', $request->input('email'))->first();
        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function show()
    {
        $users = User::All();
        return response()->json([
            'users' => $users
        ]);
    }
}
