<?php
require_once __DIR__ . '/../../app/controllers/CentroTrabajoController.php';

$controllerCentroTrabajo = new CentroTrabajoController();
$centros_trabajo = $controllerCentroTrabajo->obtenerCentrosTrabajo();


require_once __DIR__ . '/../../app/views/centroTrabajo/index.php';