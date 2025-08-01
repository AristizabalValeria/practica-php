<?php
require_once dirname(__DIR__, 2) . '/config/DB.php';
require_once dirname(__DIR__) . '/models/Usuario.php';
class UsuarioRepository{
    private $db;

    public function __construct(){
        $this->db = DB::getConnection();
    }

    public function mapearUsuario($row){
        return new Usuario(
            $row['Id'],
            $row['Cedula'],
            $row['Nombre_completo'],
            $row['Telefono'],
            $row['Correo'],
            $row['Saldo'],
            $row['QR'],
            $row['Clave'],
            $row['Rol'],
            $row['Fecha_registro'],
            $row['Estado'],
            $row['Id_centro_trabajo']
        );
    }

    public function obtenerUsuarios(){
        $query = $this->db->prepare("SELECT * FROM usuario");
        $query->execute();
        $result = $query->get_result();

        $usuarios = [];
        while ($row = $result->fetch_assoc()) { 
            $usuarios[] = $this->mapearUsuario($row);
        }
        return $usuarios;
    }

    public function obtenerUsuarioPorCedula($cedula){
        $query = $this->db->prepare("SELECT * FROM usuario where cedula = ?");
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
        $query = $this->db->prepare("SELECT * FROM usuario where correo = ?");
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

    public function actualizarUsuario($cedula, $nombre_completo, $telefono, $correo, $saldo, $rol, $estado, $id_centro_trabajo){
        $query = $this->db->prepare("
            UPDATE usuario 
            SET Nombre_completo = ?, Telefono = ?, Correo = ?, Saldo = ?, Rol = ?, Estado = ?, Id_centro_trabajo = ? 
            WHERE Cedula = ?
        ");
        $query->bind_param(
            "sssdssis",
            $nombre_completo,
            $telefono,
            $correo,    
            $saldo,
            $rol,
            $estado,
            $id_centro_trabajo,
            $cedula,
        );

        return $query->execute();  
    }

    public function eliminarUsuarioCedula($cedula){
        try{
            $query = $this->db->prepare("DELETE FROM usuario WHERE Cedula = ?");
            $query->bind_param("s", $cedula);
            $query->execute();
        } catch(Exception $e){
            throw new Exception("Error al eliminar el usuario: " . $e->getMessage());
        }
    }
}
?>