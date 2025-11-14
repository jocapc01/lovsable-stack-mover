<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/config.php';
session_start();

define('BASE_PATH', '/teste/agendamentos-multilojas');

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$url = str_replace(BASE_PATH, '', $url);
$url = ltrim($url, '/');
$url = empty($url) ? 'home/index' : $url;

list($controller, $action) = array_pad(explode('/', $url), 2, 'index');
$controller = ucfirst(strtolower($controller)) . 'Controller';
$controllerClass = "src\\Controller\\{$controller}";

$routes = [
    'auth/login' => ['AuthController', 'login'],
    'loja/create' => ['LojaController', 'create'],
    'servicos/index' => ['ServicosController', 'index'],
    'servicos/create' => ['ServicosController', 'create'],
    'agendamento/index' => ['AgendamentoController', 'index'],
    'agendamento/create' => ['AgendamentoController', 'create'],
    'agendamento/horarios-disponiveis' => ['AgendamentoController', 'horariosDisponiveis'],
    'agendamentos' => ['AgendamentosController', 'index'],
    'agendamentos/create' => ['AgendamentosController', 'create'],
    'agendamentos/horarios-disponiveis' => ['AgendamentosController', 'horariosDisponiveis']
];

try {
    if (class_exists($controllerClass)) {
        $controllerInstance = new $controllerClass();
        if (method_exists($controllerInstance, $action)) {
            $controllerInstance->$action();
        } else {
            throw new Exception("Ação não encontrada: {$action}");
        }
    } else {
        throw new Exception("Controlador não encontrado: {$controller}");
    }
} catch (Exception $e) {
    echo 'Erro: ' . $e->getMessage();
}