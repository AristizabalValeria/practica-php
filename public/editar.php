<?php
require_once __DIR__ . '/../app/controllers/UsuarioController.php';

$controller = new UsuarioController();
$usuario = null;

if (!empty($_GET['cedula'])) {
    $usuario = $controller->obtenerUsuarioPorCedula($_GET['cedula']);
    if (!$usuario) {
        die("Usuario no encontrado.");
    }
}

// Si es POST, procesar la actualización
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->editarUsuario($_POST);
    header("Location: /index.php?mensaje=Usuario actualizado correctamente");
    exit();
}

require_once __DIR__ . '/../app/views/usuario/editar.php';
?>