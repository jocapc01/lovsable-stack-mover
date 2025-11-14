<?php

namespace App\Controllers;

use App\Models\User;
use App\Helpers\Auth;

class AuthController
{
    public function login($request)
    {
        // Lógica para autenticar o usuário
        $email = $request['email'];
        $password = $request['password'];

        $user = User::findByEmail($email);

        if ($user && password_verify($password, $user->senha)) {
            Auth::login($user);
            return ['status' => 'success', 'message' => 'Login realizado com sucesso.'];
        }

        return ['status' => 'error', 'message' => 'Credenciais inválidas.'];
    }

    public function logout()
    {
        Auth::logout();
        return ['status' => 'success', 'message' => 'Logout realizado com sucesso.'];
    }

    public function register($request)
    {
        // Lógica para registrar um novo usuário
        $user = new User();
        $user->nome = $request['nome'];
        $user->email = $request['email'];
        $user->senha = password_hash($request['senha'], PASSWORD_BCRYPT);
        $user->tipo_usuario = 'cliente'; // ou outro tipo conforme necessário

        if ($user->save()) {
            return ['status' => 'success', 'message' => 'Usuário registrado com sucesso.'];
        }

        return ['status' => 'error', 'message' => 'Erro ao registrar usuário.'];
    }
}