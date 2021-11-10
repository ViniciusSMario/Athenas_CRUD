<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomExceptions;
use App\Helpers\CustomHelper;
use App\Exceptions\Exceptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller
{
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|max:255',
            'password' => 'required|string',
        ], CustomHelper::get_mensagens_validacao());

        if($validator->fails()){
            throw new CustomExceptions($validator->errors()->first(), 400);
        }

        $credentials = $request->only('email', 'password');

        try
        {
            if (! $token = JWTAuth::attempt($credentials))
            {
                return response()->json(['message' => 'Credenciais incorretas'], 400);
            }
        }
        catch ( JWTException $e)
        {
            return response()->json(['message' => 'Erro ao criar token'], 400);
        }

        return response()->json(compact('token'), 200);
    }
}
