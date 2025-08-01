<?php
require_once dirname(__DIR__, 2) . '/config/DB.php';
require_once dirname(__DIR__) . '/models/Usuario.php';
require_once dirname(__DIR__) . '/repositories/UsuarioRepository.php';


class UsuarioController{
    private $usuarioRepository;

    public function __construct(){
        $this->usuarioRepository = new UsuarioRepository();
    }

    public function guardarUsuario(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            try{
                $cedula = $_POST['cedula'];
                $nombre_completo = $_POST['nombre_completo'];
                $telefono = $_POST['telefono'];
                $correo = $_POST['correo'];
                $saldo = $_POST['saldo'];
                $QR = $_POST['QR'];
                $clave = password_hash($_POST['clave'], PASSWORD_BCRYPT);
                $rol = $_POST['rol'];
                $fecha_registro = date('Y-m-d H:i:s');
                $estado = $_POST['estado'];
                $id_centro_trabajo = $_POST['id_centro_trabajo'];

                $usuario = new Usuario(null, $cedula, $nombre_completo, $telefono, $correo, $saldo, $QR, $clave, $rol, $fecha_registro, $estado, $id_centro_trabajo);
                $this->usuarioRepository->guardarUsuario($usuario);
                exit();
            } catch(Exception $e){
                echo "Error al guardar el usuario: " . $e->getMessage();
            }
        }
    }

    public function listarUsuarios() {
        $usuarios = [];

        if (!empty($_GET['cedula'])) {
            $usuario = $this->usuarioRepository->obtenerUsuarioPorCedula($_GET['cedula']);
            if ($usuario) $usuarios[] = $usuario;
        } elseif (!empty($_GET['correo'])) {
            $usuario = $this->usuarioRepository->obtenerUsuarioPorCorreo($_GET['correo']);
            if ($usuario) $usuarios[] = $usuario;
        } else {
            $usuarios = $this->usuarioRepository->obtenerUsuarios();
        }

        require_once __DIR__ . '/../views/usuario/index.php';
    }

    
}
?>