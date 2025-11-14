<?php

namespace App\Models;

use PDO;

class Service
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function create($data)
    {
        $stmt = $this->db->prepare("INSERT INTO servicos (loja_id, nome, descricao, preco, duracao, funcionario_id) VALUES (:loja_id, :nome, :descricao, :preco, :duracao, :funcionario_id)");
        return $stmt->execute($data);
    }

    public function update($id, $data)
    {
        $data['id'] = $id;
        $stmt = $this->db->prepare("UPDATE servicos SET nome = :nome, descricao = :descricao, preco = :preco, duracao = :duracao, funcionario_id = :funcionario_id WHERE id = :id");
        return $stmt->execute($data);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM servicos WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM servicos WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function all($loja_id)
    {
        $stmt = $this->db->prepare("SELECT * FROM servicos WHERE loja_id = :loja_id");
        $stmt->execute(['loja_id' => $loja_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}