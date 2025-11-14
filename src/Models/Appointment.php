<?php

namespace App\Models;

use PDO;

class Appointment
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function create($data)
    {
        $stmt = $this->db->prepare("INSERT INTO agendamentos (loja_id, cliente_id, servico_id, funcionario_id, data, hora, status) VALUES (:loja_id, :cliente_id, :servico_id, :funcionario_id, :data, :hora, :status)");
        return $stmt->execute([
            ':loja_id' => $data['loja_id'],
            ':cliente_id' => $data['cliente_id'],
            ':servico_id' => $data['servico_id'],
            ':funcionario_id' => $data['funcionario_id'],
            ':data' => $data['data'],
            ':hora' => $data['hora'],
            ':status' => 'pendente'
        ]);
    }

    public function confirm($id)
    {
        $stmt = $this->db->prepare("UPDATE agendamentos SET status = :status WHERE id = :id");
        return $stmt->execute([
            ':status' => 'confirmado',
            ':id' => $id
        ]);
    }

    public function cancel($id)
    {
        $stmt = $this->db->prepare("UPDATE agendamentos SET status = :status WHERE id = :id");
        return $stmt->execute([
            ':status' => 'cancelado',
            ':id' => $id
        ]);
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM agendamentos WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllByStore($storeId)
    {
        $stmt = $this->db->prepare("SELECT * FROM agendamentos WHERE loja_id = :loja_id");
        $stmt->execute([':loja_id' => $storeId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}