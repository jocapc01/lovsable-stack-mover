<?php

namespace src\Controller;

use src\Model\Usuario;

class UsuarioController extends Controller {
    private $usuario;
    private $errors = [];

    public function __construct() {
        $this->usuario = new Usuario();
    }

    public function index() {
        $usuarios = $this->usuario->findAll();
        return $this->render('usuario/index', [
            'usuarios' => $usuarios,
            'title' => 'Usuários'
        ]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $data = [
                    'nome' => $_POST['nome'],
                    'email' => $_POST['email'],
                    'senha' => $_POST['senha'],
                    'tipo_usuario' => $_POST['tipo_usuario'],
                    'loja_id' => $_POST['loja_id'] ?? null
                ];
                
                if ($this->usuario->create($data)) {
                    $this->redirect('/usuario');
                }
            } catch (\Exception $e) {
                $this->errors[] = $e->getMessage();
            }
        }
        
        return $this->render('usuario/create', [
            'errors' => $this->errors
        ]);
    }
}
