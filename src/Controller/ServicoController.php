<?php

namespace src\Controller;

use src\Model\Servico;
use src\Helper\Auth;

class ServicoController extends Controller {
    private $servico;

    public function __construct() {
        if (!Auth::check()) {
            header('Location: ' . BASE_URL . '/auth/login');
            exit;
        }
        $this->servico = new Servico();
    }

    public function index() {
        $loja_id = Auth::user()['loja_id'];
        $servicos = $this->servico->getByLoja($loja_id);
        
        return $this->render('servico/index', [
            'servicos' => $servicos,
            'title' => 'Gerenciar Serviços'
        ]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'loja_id' => Auth::user()['loja_id'],
                'nome' => $_POST['nome'],
                'descricao' => $_POST['descricao'],
                'preco' => $_POST['preco'],
                'duracao' => $_POST['duracao']
            ];
            
            if ($this->servico->create($data)) {
                header('Location: ' . BASE_URL . '/servico');
                exit;
            }
        }
        return $this->render('servico/create');
    }
}
