<?php

namespace src\Controller;

use src\Model\Usuario;

class AuthController extends Controller {
    private $usuario;

    public function __construct() {
        $this->usuario = new Usuario();
    }

    public function login() {
        // Se já está logado, redireciona para dashboard
        if ($this->isAuthenticated()) {
            $this->redirect('/dashboard');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            
            if ($user = $this->usuario->authenticate($email, $senha)) {
                $_SESSION['user'] = $user;
                $redirect = $_SESSION['return_to'] ?? '/dashboard';
                unset($_SESSION['return_to']);
                $this->redirect($redirect);
            } else {
                $error = "Email ou senha inválidos";
            }
        }

        return $this->render('auth/login', [
            'error' => $error ?? null
        ]);
    }

    public function logout() {
        session_destroy();
        $this->redirect('/auth/login');
    }

    protected function redirect($path) {
        header('Location: ' . BASE_PATH . $path);
        exit;
    }
}
