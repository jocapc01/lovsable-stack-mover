<?php

namespace src\Controller;

class HomeController extends Controller {
    public function index() {
        return $this->render('home/index', [
            'title' => 'Sistema de Agendamentos'
        ]);
    }
}
