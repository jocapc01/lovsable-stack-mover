<?php

namespace src\Model;

class Agendamento extends Model {
    protected $table = 'agendamentos';
    
    public function count() {
        $stmt = $this->db->query("SELECT COUNT(*) FROM {$this->table}");
        return (int)$stmt->fetchColumn();
    }
    
    public function countToday() {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM {$this->table} WHERE DATE(data) = CURDATE()");
        $stmt->execute();
        return (int)$stmt->fetchColumn();
    }

    public function countByStatus($status) {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM {$this->table} WHERE status = ?");
        $stmt->execute([$status]);
        return (int)$stmt->fetchColumn();
    }

    public function getAllWithDetails() {
        $sql = "SELECT a.*, 
                s.nome as servico_nome,
                c.nome as cliente_nome,
                f.nome as funcionario_nome
                FROM {$this->table} a
                JOIN servicos s ON a.servico_id = s.id
                JOIN usuarios c ON a.cliente_id = c.id
                JOIN usuarios f ON a.funcionario_id = f.id
                ORDER BY a.data ASC, a.hora ASC";
                
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function findByDataFuncionario($data, $funcionario_id) {
        $stmt = $this->db->prepare("
            SELECT * FROM {$this->table} 
            WHERE data = ? 
            AND funcionario_id = ? 
            AND status != 'cancelado'
        ");
        $stmt->execute([$data, $funcionario_id]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
