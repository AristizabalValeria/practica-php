<?php
require_once dirname(__DIR__, 2) . '/config/DB.php';
require_once dirname(__DIR__) . '/models/CentroTrabajo.php';
require_once dirname(__DIR__) . '/repositories/CentroTrabajoRepository.php';

class CentroTrabajoController {
    private $centroTrabajoRepository;

    public function __construct(){
        $this->centroTrabajoRepository = new CentroTrabajoRepository();
    }

    public function guardarCentroTrabajo(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            try{
                $id = $_POST['id'];
                $nombre = $_POST['nombre'];

                $centro_trabajo = new CentroTrabajo($id, $nombre);
                $this->centroTrabajoRepository->guardarCentroTrabajo($centro_trabajo);
                exit();
            } catch (Exception $e) {
                echo "Error al guardar el centro de trabajo: " . $e->getMessage();
                return;
            }
        }
    }

    public function obtenerCentrosTrabajo() {
        try {
            $centros_trabajo = $this->centroTrabajoRepository->obtenerCentrosTrabajo();
            return $centros_trabajo;
        } catch (Exception $e) {
            echo "Error al obtener los centros de trabajo: " . $e->getMessage();
        }
    }

    public function obtenerCentroTrabajoPorId(){
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            try{
                $id = $_GET['id'];
                $centro_trabajo = $this->centroTrabajoRepository->obtenerCentroTrabajoPorId($id);
                return $centro_trabajo;
            } catch (Exception $e) {
                echo "Error al obtener el centro de trabajo por ID: " . $e->getMessage();
            }
        }
    }
}