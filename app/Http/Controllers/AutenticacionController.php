<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AutenticacionController extends Controller
{
    //
    public function login(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');

        //verificando si la persona existe en la bd
        $user = User::where('email',$email)->where('password',$password)->first(); //{}
        if($user){
            //generar un token (texto plano)
            $token = $user->createToken('api-token')->plainTextToken;
            return response()->json([
                "user" => $email,
                "token" => $token
            ], 200);
        }else{
            return response()->json(['message' => 'No estas autorizado'], 401);
        }
        
    }
}
