<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'address'  => 'string|max:255',
        ]);

        $roleId = $request->input('role_id', 1);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'address'  => $request->address,
            'role_id'  => $roleId,
        ]);

        // Vous pouvez ajouter d'autres fonctionnalités comme l'envoi de courriel de confirmation, etc.

        return response()->json(['message' => 'Utilisateur enregistré avec succès'], 201);
    }

    public function getUser(Request $request)
    {

        // Récupérer l'utilisateur authentifié
        $user = $request->user();

        // Renvoyer l'utilisateur en réponse JSON
        return response()->json($user);
    }

}
