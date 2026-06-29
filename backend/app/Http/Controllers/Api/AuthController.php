<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user = new User();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));

        $user->save();

        return response()->json($user);
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->input('email'))->first();

        if (!$user) {
            return response()->json([
                'error' => 'Benutzer nicht gefunden.'
            ], 404);
        }

        if (!Hash::check($request->input('password'), $user->password)) {
            return response()->json([
                'error' => 'Passwort ist falsch.'
            ], 400);
        }

        return response()->json([
            'message' => 'Login erfolgreich.',
            'user' => $user
        ]);
    }
}