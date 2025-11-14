<?php

namespace src\Model;

class Loja extends Model {
    protected $table = 'lojas';
    
    public function create($data) {
        if ($this->emailExists($data['email'])) {
            throw new \Exception("Email já cadastrado");
        }
        
        $slug = $this->createUniqueSlug($data['nome']);
        
        $sql = "INSERT INTO lojas (nome, slug, email, telefone) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $data['nome'],
            $slug,
            $data['email'],
            $data['telefone']
        ]);
    }
    
    private function emailExists($email) {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM {$this->table} WHERE email = ?");
        $stmt->execute([$email]);
        return (int)$stmt->fetchColumn() > 0;
    }
    
    private function createUniqueSlug($nome) {
        $slug = $this->createSlug($nome);
        $originalSlug = $slug;
        $counter = 1;
        
        while ($this->slugExists($slug)) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }
        
        return $slug;
    }
    
    private function createSlug($nome) {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $this->removeAcentos($nome))));
        return $slug;
    }
    
    private function slugExists($slug) {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM {$this->table} WHERE slug = ?");
        $stmt->execute([$slug]);
        return (int)$stmt->fetchColumn() > 0;
    }
    
    private function removeAcentos($string) {
        return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
    }
}
