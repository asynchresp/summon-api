<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\User;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = new User();

        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = $request->password;

        $user->save();

        return response()->json(['message' => 'Register Success']);
    }
}
