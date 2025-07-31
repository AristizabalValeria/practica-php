<?php
require_once __DIR__ . '../config/DB.php';

class Usuario {
    private $id;
    private $cedula;
    private $nombre_completo;
    private $telefono;
    private $correo;
    private $saldo;
    private $QR;
    private $clave;
    private $rol;
    private $fecha_registro;
    private $estado;
    private $id_centro_trabajo;

    public function __construct($id, $cedula, $nombre_completo, $telefono, $correo, $saldo, $QR, $clave, $rol, $fecha_registro, $estado, $id_centro_trabajo) {
        $this->id = $id;
        $this->cedula = $cedula;
        $this->nombre_completo = $nombre_completo;
        $this->telefono = $telefono;
        $this->correo = $correo;
        $this->saldo = $saldo;
        $this->QR = $QR;
        $this->clave = $clave;
        $this->rol = $rol;
        $this->fecha_registro = new DateTime($fecha_registro);
        $this->estado = $estado;
        $this->id_centro_trabajo = $id_centro_trabajo;
    }

    // Getters
    public function getId() { return $this->id; }
    public function getCedula() { return $this->cedula; }
    public function getNombreCompleto() { return $this->nombre_completo; }
    public function getTelefono() { return $this->telefono; }
    public function getCorreo() { return $this->correo; }
    public function getSaldo() { return $this->saldo; }
    public function getQR() { return $this->QR; }
    public function getClave() { return $this->clave; }
    public function getRol() { return $this->rol; }
    public function getFechaRegistro() { return $this->fecha_registro; }
    public function getEstado() { return $this->estado; }
    public function getIdCentroTrabajo() { return $this->id_centro_trabajo; }

    // Setters
    public function setCedula($cedula) { $this->cedula = $cedula; }
    public function setNombreCompleto($nombre) { $this->nombre_completo = $nombre; }
    public function setTelefono($telefono) { $this->telefono = $telefono; }
    public function setCorreo($correo) { $this->correo = $correo; }
    public function setSaldo($saldo) { $this->saldo = $saldo; }
    public function setQR($qr) { $this->QR = $qr; }
    public function setClave($clave) { $this->clave = $clave; }
    public function setRol($rol) { $this->rol = $rol; }
    public function setFechaRegistro($fecha) { $this->fecha_registro = new DateTime($fecha); }
    public function setEstado($estado) { $this->estado = $estado; }
    public function setIdCentroTrabajo($idCentro) { $this->id_centro_trabajo = $idCentro; }

}
?>