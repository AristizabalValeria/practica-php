<?php
require_once __DIR__ . '/../app/controllers/UsuarioController.php';

$controller = new UsuarioController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->guardarUsuario();
}

require_once __DIR__ . '/../app/views/auth/register.php';
