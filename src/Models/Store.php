<?php

namespace App\Models;

use PDO;

class Store
{
    private $db;
    private $table = 'lojas';

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function create($data)
    {
        $stmt = $this->db->prepare("INSERT INTO {$this->table} (nome, slug, email, telefone, tema_primario, tema_secundario, logo, banner, horario_funcionamento) VALUES (:nome, :slug, :email, :telefone, :tema_primario, :tema_secundario, :logo, :banner, :horario_funcionamento)");
        return $stmt->execute($data);
    }

    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM {$this->table}");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data)
    {
        $data['id'] = $id;
        $stmt = $this->db->prepare("UPDATE {$this->table} SET nome = :nome, slug = :slug, email = :email, telefone = :telefone, tema_primario = :tema_primario, tema_secundario = :tema_secundario, logo = :logo, banner = :banner, horario_funcionamento = :horario_funcionamento WHERE id = :id");
        return $stmt->execute($data);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}