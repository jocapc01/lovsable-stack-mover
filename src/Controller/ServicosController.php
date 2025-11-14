<?php

namespace src\Controller;

class ServicosController extends Controller {
    private $servico;
    private $usuario;

    public function __construct() {
        $this->requireAuth();
        $this->servico = new \src\Model\Servico();
        $this->usuario = new \src\Model\Usuario();
    }

    public function index() {
        $loja_id = $_SESSION['user']['loja_id'] ?? null;
        if (!$loja_id) {
            $this->redirect('/auth/login');
        }

        $servicos = $this->servico->findByLoja($loja_id);
        return $this->render('servicos/index', [
            'servicos' => $servicos,
            'title' => 'Serviços'
        ]);
    }

    public function create() {
        $loja_id = $_SESSION['user']['loja_id'] ?? null;
        if (!$loja_id) {
            $this->redirect('/auth/login');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $data = [
                    'loja_id' => $loja_id,
                    'nome' => $_POST['nome'],
                    'descricao' => $_POST['descricao'],
                    'preco' => $_POST['preco'],
                    'duracao' => $_POST['duracao']
                ];
                
                if ($this->servico->create($data)) {
                    $this->redirect('/servicos');
                }
            } catch (\Exception $e) {
                $error = $e->getMessage();
            }
        }
        
        return $this->render('servicos/create', [
            'error' => $error ?? null
        ]);
    }

    public function profissionais($id) {
        $servico = $this->servico->findById($id);
        $profissionais = $this->usuario->findByTypeAndLoja('funcionario', $_SESSION['user']['loja_id']);
        $profissionaisAtivos = $this->servico->getProfissionais($id);

        return $this->render('servicos/profissionais', [
            'servico' => $servico,
            'profissionais' => $profissionais,
            'profissionaisAtivos' => $profissionaisAtivos
        ]);
    }

    public function addProfissional() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $servico_id = $_POST['servico_id'];
            $usuario_id = $_POST['usuario_id'];
            
            $this->servico->addProfissional($servico_id, $usuario_id);
            $this->redirect('/servicos/profissionais/' . $servico_id);
        }
    }
}
