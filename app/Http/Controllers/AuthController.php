<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

       if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $token = Auth::user()->createToken('login');

            return response(['token' => $token->plainTextToken], 200);
       }

       return response('', 404);
    }

    public function logout() {
        Auth::user()->currentAccessToken()->delete();

        return response('', 200);
    }
}
