<?php

namespace src\Controller;

class LojaController extends Controller {
    private $loja;
    private $errors = [];

    public function __construct() {
        $this->loja = new \src\Model\Loja();
    }

    public function index() {
        return $this->render('loja/index', [
            'title' => 'Painel da Loja'
        ]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $data = [
                    'nome' => $_POST['nome'],
                    'email' => $_POST['email'],
                    'telefone' => $_POST['telefone']
                ];
                
                if ($this->loja->create($data)) {
                    $this->redirect('/loja');
                }
            } catch (\Exception $e) {
                $this->errors[] = $e->getMessage();
            }
        }
        
        return $this->render('loja/create', [
            'errors' => $this->errors
        ]);
    }

    protected function redirect($path) {
        header('Location: ' . BASE_URL . $path);
        exit;
    }
}
