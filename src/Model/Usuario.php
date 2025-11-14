<?php

namespace src\Model;

class Usuario extends Model {
    protected $table = 'usuarios';
    
    public function create($data) {
        if ($this->emailExists($data['email'])) {
            throw new \Exception("Email já cadastrado");
        }

        if (strlen($data['senha']) < 6) {
            throw new \Exception("A senha deve ter no mínimo 6 caracteres");
        }
        
        $sql = "INSERT INTO usuarios (nome, email, senha, tipo_usuario, loja_id) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $data['nome'],
            $data['email'],
            password_hash($data['senha'], PASSWORD_DEFAULT),
            $data['tipo_usuario'],
            $data['loja_id']
        ]);
    }
    
    private function emailExists($email) {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM {$this->table} WHERE email = ?");
        $stmt->execute([$email]);
        return (int)$stmt->fetchColumn() > 0;
    }

    public function auth($email, $senha) {
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);
        $usuario = $stmt->fetch();

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            return $usuario;
        }
        return false;
    }

    public function authenticate($email, $senha) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE email = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        if ($usuario && password_verify($senha, $usuario['senha'])) {
            unset($usuario['senha']); // Remove a senha por segurança
            return $usuario;
        }
        
        return false;
    }

    public function countByType($tipo) {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM {$this->table} WHERE tipo_usuario = ?");
        $stmt->execute([$tipo]);
        return (int)$stmt->fetchColumn();
    }

    public function findByType($tipo) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE tipo_usuario = ?");
        $stmt->execute([$tipo]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function findByTypeAndLoja($tipo, $loja_id) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE tipo_usuario = ? AND loja_id = ?");
        $stmt->execute([$tipo, $loja_id]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
