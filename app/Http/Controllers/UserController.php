<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function userData($userId)
    {
        try {
            $user = User::find($userId);
            if (!$user) {
                return response()->json(['error' => 'User not found'], 404);
            }
            return response()->json($user);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        // if ($user && Hash::check($request->password, $user->password)) {
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken($request->email)->plainTextToken;
            return response([
                'token' => $token,
                'message' => 'login success',
                'status' => 'success'
            ], 200);
        }
        return response([
            'message' => 'Incorrect Email',
            'status' => 'failed'
        ], 401);
    }
}
