<?php

namespace src\Controller;

class DashboardController extends Controller {
    private $agendamento;
    private $servico;
    private $usuario;

    public function __construct() {
        $this->agendamento = new \src\Model\Agendamento();
        $this->servico = new \src\Model\Servico();
        $this->usuario = new \src\Model\Usuario();
    }

    public function index() {
        $stats = [
            'total_agendamentos' => $this->agendamento->count(),
            'agendamentos_hoje' => $this->agendamento->countToday(),
            'total_servicos' => $this->servico->count(),
            'total_clientes' => $this->usuario->countByType('cliente')
        ];

        return $this->render('dashboard/index', [
            'title' => 'Dashboard',
            'stats' => $stats
        ]);
    }
}
