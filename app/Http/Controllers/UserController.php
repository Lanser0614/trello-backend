<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(LoginRequest $loginRequest)
    {
        $credentials = $loginRequest->validated();

        if (Auth::attempt($credentials)) {
            $success['token'] = Auth::user()->createToken('MyApp')->plainTextToken;
            $success['name'] = Auth::user()->name;
            return response()->json(['success' => $success]);
        }

        return response()->json(['error' => 'Unauthorised'], 401);
    }

    public function register(RegisterRequest $registerRequest)
    {
        $input = $registerRequest->validated();
        $input['password'] = bcrypt($input['password']);

        $user = User::query()->create($input);
        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['name'] = $user->name;

        return response()->json(['success' => $success]);
    }

    public function getDetails()
    {
        return response()->json(['success' => Auth::user()]);
    }
}
