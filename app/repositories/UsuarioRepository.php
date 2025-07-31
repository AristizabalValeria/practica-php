<?php
require_once dirname(__DIR__) . '/config/DB.php';
require_once dirname(__DIR__) . '/models/Usuario.php';
class UsuarioRepository{
    private $db;

    public function __construct(){
        $this->db = DB::getConnection();
    }

    public function mapearUsuario($row){
        return new Usuario(
            $row['id'],
            $row['cedula'],
            $row['nombre_completo'],
            $row['telefono'],
            $row['correo'],
            $row['saldo'],
            $row['QR'],
            $row['clave'],
            $row['rol'],
            $row['fecha_registro'],
            $row['estado'],
            $row['id_centro_trabajo']
        );
    }

    public function obtenerUsuarios(){
        $query = $this->db->prepare("SELECT * FROM usuarios");
        $query->execute();
        $result = $query->get_result();

        $usuarios = [];
        $row = $result->fetch_assoc();
        while ($row) {
            $usuarios[] = $this->mapearUsuario($row);
        }
    }

    public function obtenerUsuarioPorCedula($cedula){
        $query = $this->db->prepare("SELECT * FROM usuarios where cedula = ?");
        $query->bind_param("s", $cedula);
        $query->execute();
        $result = $query->get_result()->fetch_assoc();

        if($result) {
            $usuario = $this->mapearUsuario($result);
            return $usuario;
        } else {
            return null;
        }
    }

    public function obtenerUsuarioPorCorreo($correo){
        $query = $this->db->prepare("SELECT * FROM usuarios where correo = ?");
        $query->bind_param("s", $correo);
        $query->execute();
        $result = $query->get_result()->fetch_assoc();

        if($result) {
            $usuario = $this->mapearUsuario($result);
            return $usuario;
        } else {
            return null;
        }
    }

    public function guardarUsuario(Usuario $usuario){
        $clave_hash = password_hash($usuario->getClave(), PASSWORD_DEFAULT);
        $fecha_actual = $usuario->getFechaRegistro()->format('Y-m-d H:i:s');
        $query = $this->db->prepare("INSERT INTO usuario (cedula, nombre_completo, telefono, correo, saldo, QR, clave, rol, fecha_registro, estado, id_centro_trabajo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $query->bind_param(
            "ssssdsssssi",
            $usuario->getCedula(),
            $usuario->getNombreCompleto(),
            $usuario->getTelefono(),
            $usuario->getCorreo(),
            $usuario->getSaldo(),
            $usuario->getQR(),
            $clave_hash,
            $usuario->getRol(),
            $fecha_actual,
            $usuario->getEstado(),
            $usuario->getIdCentroTrabajo()
        );
        $query->execute();
    }

    public function actualizarUsuario(Usuario $usuario){
        $clave_hash = password_hash($usuario->getClave(), PASSWORD_DEFAULT);
        $fecha_actual = $usuario->getFechaRegistro()->format('Y-m-d H:i:s');
        $query = $this->db->prepare("UPDATE usuarios SET cedula = ?, nombre_completo = ?, telefono = ?, correo = ?, saldo = ?, QR = ?, clave = ?, rol = ?, fecha_registro = ?, estado = ?, id_centro_trabajo = ? WHERE id = ?");
        $query->bind_param(
            "ssssdssssii",
            $usuario->getCedula(),
            $usuario->getNombreCompleto(),
            $usuario->getTelefono(),
            $usuario->getCorreo(),
            $usuario->getSaldo(),
            $usuario->getQR(),
            $clave_hash,
            $usuario->getRol(),
            $fecha_actual,
            $usuario->getEstado(),
            $usuario->getIdCentroTrabajo(),
            $usuario->getId()
        );
        $query->execute();  
    }

    public function eliminarUsuarioCedula($cedula){
        $query = $this->db->prepare("DELETE FROM usuarios WHERE cedula = ?");
        $query->bind_param("s", $cedula);
        $query->execute();
    }
}
?>