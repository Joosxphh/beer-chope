<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json(["message" => "Invalid credentials"], 401);
        }

        // Obtenir l'utilisateur authentifié
        /**
         * @var User $user
         */
        $user = Auth::user();

        // Générer le token d'authentification
        $token = $user->createToken("auth_token");

        // Renvoyer la réponse JSON avec le token et l'utilisateur
        return response()->json([
            "token" => $token->plainTextToken,
            "user"  => $user, // Ajout de l'utilisateur à la réponse
        ]);
    }

    public function getUser(Request $request)
    {

        // Récupérer l'utilisateur authentifié
        $user = $request->user();

        // Renvoyer l'utilisateur en réponse JSON
        return response()->json($user);
    }

}
