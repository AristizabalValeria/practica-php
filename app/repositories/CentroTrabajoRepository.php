<?php
require_once dirname(__DIR__, 2) . '/config/DB.php';
require_once dirname(__DIR__) . '/models/CentroTrabajo.php';

class CentroTrabajoRepository{
    private $db;

    public function __construct(){
        $this->db = DB::getConnection();
    }

    public function mapearCentroTrabajo($row){
        return new CentroTrabajo(
            $row['Id'],
            $row['Nombre']
        );
    }

    public function obtenerCentrosTrabajo(){
        $query = $this->db->prepare("SELECT * FROM centro_trabajo");
        $query->execute();
        $result = $query->get_result();

        $centros_trabajo = [];
        while ($row = $result->fetch_assoc()) { 
            $centros_trabajo[] = $this->mapearCentroTrabajo($row);
        }
        return $centros_trabajo;
    }

    public function obtenerCentroTrabajoPorId($id){
        $query = $this->db->prepare("SELECT * FROM centro_trabajo where id = ?");
        $query->bind_param("i", $id);
        $query->execute();
        $result = $query->get_result()->fetch_assoc();

        if($result) {
            $centro_trabajo = $this->mapearCentroTrabajo($result);
            return $centro_trabajo;
        } else {
            return null;
        }
    }

    public function guardarCentroTrabajo(CentroTrabajo $centro_trabajo){
        $query = $this->db->prepare("INSERT INTO centro_trabajo (Nombre) VALUES (?)");
        $nombre = $centro_trabajo->getNombre();
        $query->bind_param("s", $nombre);
        return $query->execute();
    }

    public function actualizarCentroTrabajo($id, $nombre){
        $query = $this->db->prepare("UPDATE centro_trabajo SET Nombre = ? WHERE Id = ?");
        $query->bind_param("si", $nombre, $id);
        return $query->execute();
    }

    public function eliminarCentroTrabajo($id){
        try{
            $query = $this->db->prepare("DELETE FROM centro_trabajo WHERE Id = ?");
            $query->bind_param("i", $id);
            return $query->execute();
        } catch (Exception $e) {
            throw new Exception("No se puede eliminar el centro de trabajo porque está asociado a un usuario.");
        }
    }
}