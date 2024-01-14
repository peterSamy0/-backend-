<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        try {
            $this->validate($request, [
                "email" => "required|email",
                "password" => "required",
            ]);
            $login = $request->only("email", "password");
            if (!Auth::attempt($login)) {
                return response(['message' => 'invalid login'], 401);
            }
            $user = Auth::user();
            $user->tokens()->delete();
            $token = $user->createToken($user->full_name);
            return response([
                // 'id'=> $user->id,
                // 'name' => $user->full_name,
                // 'email' => $user->email,
                'role' => $user->role,
                'token' => $token->plainTextToken
            ], 200);
        } catch (Exception $e) {
            return response()->json($e, 500);
        }
    }
}
