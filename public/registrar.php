<?php
require_once __DIR__ . '/../app/controllers/UsuarioController.php';
require_once __DIR__ . '/../app/controllers/CentroTrabajoController.php';

$controller = new UsuarioController();
$controllerCentroTrabajo = new CentroTrabajoController();
$centros_trabajo = $controllerCentroTrabajo->obtenerCentrosTrabajo();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->guardarUsuario();
}

require_once __DIR__ . '/../app/views/usuario/registrar.php';
    