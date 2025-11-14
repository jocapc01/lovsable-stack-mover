<?php

namespace App\Models;

use PDO;

class Product
{
    private $db;
    private $table = 'produtos';

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function create($data)
    {
        $stmt = $this->db->prepare("INSERT INTO {$this->table} (nome, descricao, preco, estoque, loja_id) VALUES (:nome, :descricao, :preco, :estoque, :loja_id)");
        return $stmt->execute([
            ':nome' => $data['nome'],
            ':descricao' => $data['descricao'],
            ':preco' => $data['preco'],
            ':estoque' => $data['estoque'],
            ':loja_id' => $data['loja_id']
        ]);
    }

    public function read($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data)
    {
        $stmt = $this->db->prepare("UPDATE {$this->table} SET nome = :nome, descricao = :descricao, preco = :preco, estoque = :estoque WHERE id = :id");
        return $stmt->execute([
            ':nome' => $data['nome'],
            ':descricao' => $data['descricao'],
            ':preco' => $data['preco'],
            ':estoque' => $data['estoque'],
            ':id' => $id
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }

    public function getAll($loja_id)
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE loja_id = :loja_id");
        $stmt->execute([':loja_id' => $loja_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}