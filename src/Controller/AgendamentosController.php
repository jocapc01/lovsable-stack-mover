<?php

namespace src\Controller;

class AgendamentosController extends Controller {
    public function __construct() {
        $this->requireAuth();
        $this->agendamento = new \src\Model\Agendamento();
        $this->servico = new \src\Model\Servico();
        $this->usuario = new \src\Model\Usuario();
    }

    public function index() {
        $loja_id = $_SESSION['user']['loja_id'] ?? null;
        $agendamentos = $this->agendamento->getAllWithDetails($loja_id);
        
        return $this->render('agendamentos/index', [
            'agendamentos' => $agendamentos,
            'title' => 'Agendamentos'
        ]);
    }

    public function create() {
        $loja_id = $_SESSION['user']['loja_id'] ?? null;
        
        // Buscar serviços e funcionários para o formulário
        $servicos = $this->servico->findByLoja($loja_id);
        $funcionarios = $this->usuario->findByTypeAndLoja('funcionario', $loja_id);
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $data = [
                    'loja_id' => $loja_id,
                    'servico_id' => $_POST['servico_id'],
                    'cliente_id' => $_SESSION['user']['id'],
                    'funcionario_id' => $_POST['funcionario_id'],
                    'data' => $_POST['data'],
                    'hora' => $_POST['hora'],
                    'status' => 'pendente'
                ];
                
                if ($this->agendamento->create($data)) {
                    $this->redirect('/agendamentos');
                }
            } catch (\Exception $e) {
                $error = $e->getMessage();
            }
        }
        
        return $this->render('agendamentos/create', [
            'servicos' => $servicos,
            'funcionarios' => $funcionarios,
            'error' => $error ?? null
        ]);
    }
}
