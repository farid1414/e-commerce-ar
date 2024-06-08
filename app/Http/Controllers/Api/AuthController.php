<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Mengambil input username dan password dari request
        $data = $request->only('username', 'password');

        // Aturan validasi
        $rules = [
            'username' => 'required|string',
            'password' => 'required|string'
        ];

        // Pesan kustom untuk validasi
        $messages = [
            'required' => 'param `:attribute` required'
        ];

        // Membuat validator
        $validator = Validator::make($data, $rules, $messages);

        // Jika validasi gagal, kembalikan respon dengan kesalahan validasi
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Error validation',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Mencoba untuk membuat token dengan kredensial yang diberikan
            if (!$token = JWTAuth::attempt($data)) {
                return response()->json([
                    'message' => 'Invalid credentials'
                ], 401);
            }
        } catch (JWTException $e) {
            // Jika terjadi kesalahan saat pembuatan token, kembalikan respon dengan kesalahan
            return response()->json([
                'message' => 'Could not create token',
            ], 500);
        }

        $user = JWTAuth::user();

        // Kembalikan respon sukses dengan token yang dihasilkan
        return response()->json([
            'message' => 'Success login',
            'data' => [
                'user' => $user,
                'access_token' => $token,
                'token_type' => 'bearer'
            ]
        ], 201);
    }
}
