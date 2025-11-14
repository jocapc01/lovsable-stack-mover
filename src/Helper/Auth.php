<?php

namespace src\Helper;

class Auth {
    public static function check() {
        return isset($_SESSION['user_id']);
    }

    public static function user() {
        if (self::check()) {
            $usuario = new \src\Model\Usuario();
            return $usuario->findById($_SESSION['user_id']);
        }
        return null;
    }

    public static function isAdmin() {
        return self::check() && $_SESSION['user_type'] === 'admin';
    }

    public static function isLoja() {
        return self::check() && $_SESSION['user_type'] === 'funcionario';
    }
}
