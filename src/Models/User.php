<?php

namespace App\Models;

use PDO;

class User
{
    private $db;
    private $table = 'usuarios';

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function create($data)
    {
        $stmt = $this->db->prepare("INSERT INTO $this->table (loja_id, nome, email, senha, tipo_usuario) VALUES (:loja_id, :nome, :email, :senha, :tipo_usuario)");
        $stmt->bindParam(':loja_id', $data['loja_id']);
        $stmt->bindParam(':nome', $data['nome']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':senha', password_hash($data['senha'], PASSWORD_BCRYPT));
        $stmt->bindParam(':tipo_usuario', $data['tipo_usuario']);
        return $stmt->execute();
    }

    public function findById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM $this->table WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data)
    {
        $stmt = $this->db->prepare("UPDATE $this->table SET nome = :nome, email = :email, tipo_usuario = :tipo_usuario WHERE id = :id");
        $stmt->bindParam(':nome', $data['nome']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':tipo_usuario', $data['tipo_usuario']);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM $this->table WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function findByEmail($email)
    {
        $stmt = $this->db->prepare("SELECT * FROM $this->table WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}