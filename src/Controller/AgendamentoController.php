<?php

namespace src\Controller;

use src\Model\Agendamento;
use src\Model\Servico;
use src\Model\Usuario;

class AgendamentoController extends Controller {
    private $agendamento;
    private $servico;
    private $usuario;

    public function __construct() {
        if (!$this->isAuthenticated()) {
            $this->redirect('/auth/login');
        }
        $this->agendamento = new Agendamento();
        $this->servico = new Servico();
        $this->usuario = new Usuario();
    }

    public function index() {
        $agendamentos = $this->agendamento->getAllWithDetails();
        return $this->render('agendamento/index', [
            'agendamentos' => $agendamentos
        ]);
    }

    public function create() {
        $servicos = $this->servico->findAll();
        $funcionarios = $this->usuario->findByType('funcionario');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $data = [
                    'loja_id' => $_SESSION['loja_id'],
                    'servico_id' => $_POST['servico_id'],
                    'cliente_id' => $_SESSION['user_id'],
                    'funcionario_id' => $_POST['funcionario_id'],
                    'data' => $_POST['data'],
                    'hora' => $_POST['hora']
                ];

                if ($this->agendamento->create($data)) {
                    $this->redirect('/agendamento');
                }
            } catch (\Exception $e) {
                $error = $e->getMessage();
            }
        }

        return $this->render('agendamento/create', [
            'servicos' => $servicos,
            'funcionarios' => $funcionarios,
            'error' => $error ?? null
        ]);
    }

    public function confirmar($id) {
        $this->agendamento->updateStatus($id, 'confirmado');
        $this->redirect('/agendamento');
    }

    public function cancelar($id) {
        $this->agendamento->updateStatus($id, 'cancelado');
        $this->redirect('/agendamento');
    }

    public function horariosDisponiveis() {
        $data = $_GET['data'];
        $servico_id = $_GET['servico_id'];
        $funcionario_id = $_GET['funcionario_id'];
        
        // Buscar duração do serviço
        $servico = $this->servico->findById($servico_id);
        $duracao = $servico['duracao'];
        
        // Horário de funcionamento (8h às 18h)
        $horarios = [];
        $inicio = 8;
        $fim = 18;
        
        // Buscar agendamentos existentes
        $agendamentos = $this->agendamento->findByDataFuncionario($data, $funcionario_id);
        $horariosOcupados = array_map(function($a) { return $a['hora']; }, $agendamentos);
        
        // Gerar horários disponíveis
        for($hora = $inicio; $hora < $fim; $hora++) {
            $horario = str_pad($hora, 2, '0', STR_PAD_LEFT) . ':00';
            $disponivel = !in_array($horario, $horariosOcupados);
            
            $horarios[] = [
                'hora' => $horario,
                'disponivel' => $disponivel
            ];
        }
        
        header('Content-Type: application/json');
        echo json_encode($horarios);
        exit;
    }
}
