<?php

namespace src\Model;

class Servico extends Model {
    protected $table = 'servicos';
    
    public function getByLoja($loja_id) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE loja_id = ?");
        $stmt->execute([$loja_id]);
        return $stmt->fetchAll();
    }
    
    public function findByLoja($loja_id) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE loja_id = ?");
        $stmt->execute([$loja_id]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $sql = "INSERT INTO servicos (loja_id, nome, descricao, preco, duracao) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $data['loja_id'],
            $data['nome'],
            $data['descricao'],
            $data['preco'],
            $data['duracao']
        ]);
    }

    public function count() {
        $stmt = $this->db->query("SELECT COUNT(*) FROM {$this->table}");
        return (int)$stmt->fetchColumn();
    }

    public function getProfissionais($servico_id) {
        $sql = "SELECT u.* FROM usuarios u 
                JOIN servico_profissional sp ON u.id = sp.usuario_id 
                WHERE sp.servico_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$servico_id]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function addProfissional($servico_id, $usuario_id) {
        $sql = "INSERT INTO servico_profissional (servico_id, usuario_id) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$servico_id, $usuario_id]);
    }

    public function removeProfissional($servico_id, $usuario_id) {
        $sql = "DELETE FROM servico_profissional WHERE servico_id = ? AND usuario_id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$servico_id, $usuario_id]);
    }
}
