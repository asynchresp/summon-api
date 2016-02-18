<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(['token' => $token, 'message' => 'Login Success', 'auth' => JWTAuth::toUser($token)->load('summons')]);
    }

    public function logout()
    {
        $token = JWTAuth::getToken();
        $res = JWTAuth::invalidate($token);

        return response()->json(['message' => 'Logout successful']);
    }
}
