<?php

namespace src\Controller;

class TesteController extends Controller {
    public function index() {
        return $this->render('teste/index', [
            'title' => 'Página de Teste',
            'message' => 'Esta é uma página de teste'
        ]);
    }
}
