<?php

namespace src\Controller;

class Controller {
    protected function isAuthenticated() {
        return isset($_SESSION['user']) && !empty($_SESSION['user']['id']);
    }

    protected function requireAuth() {
        if (!$this->isAuthenticated()) {
            $_SESSION['return_to'] = $_SERVER['REQUEST_URI'];
            header('Location: ' . BASE_PATH . '/auth/login');
            exit;
        }
    }

    protected function render($view, $data = []) {
        extract($data);
        
        ob_start();
        require dirname(__DIR__, 2) . "/views/{$view}.php";
        $content = ob_get_clean();
        
        require dirname(__DIR__, 2) . "/views/layouts/main.php";
    }

    protected function redirect($path) {
        header('Location: ' . BASE_PATH . $path);
        exit;
    }
}
