<?php

return [
    'host' => 'localhost',
    'dbname' => 'agendamentos_db',
    'username' => 'root',  // Usuário padrão do XAMPP
    'password' => '',      // Senha em branco é o padrão do XAMPP
    'charset' => 'utf8',
    'options' => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ]
];