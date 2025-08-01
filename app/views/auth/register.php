<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-sm p-4">
        <h2 class="mb-4">Registro de Usuario</h2>
        <form action="/register.php" method="POST">
            <div class="mb-3">
                <label for="cedula" class="form-label">Cédula</label>
                <input type="text" class="form-control" id="cedula" name="cedula" required>
            </div>
            <div class="mb-3">
                <label for="nombre_completo" class="form-label">Nombre completo</label>
                <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" required>
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" required>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
            <div class="mb-3">
                <label for="clave" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="clave" name="clave" required>
            </div>
            <div class="mb-3">
                <label for="id_centro_trabajo" class="form-label">Centro de trabajo</label>
                <input type="number" class="form-control" id="id_centro_trabajo" name="id_centro_trabajo" required>
            </div>
            <div class="mb-3">
                <label for="saldo" class="form-label">Saldo inicial</label>
                <input type="number" step="0.01" class="form-control" id="saldo" name="saldo" value="0.00">
            </div>
            <div class="mb-3">
                <label for="QR" class="form-label">Código QR (opcional)</label>
                <input type="text" class="form-control" id="QR" name="QR">
            </div>
            <div class="mb-3">
                <label for="rol" class="form-label">Rol</label>
                <select class="form-select" id="rol" name="rol">
                    <option value="Usuario" selected>Usuario</option>
                    <option value="Administrador">Administrador</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select class="form-select" id="estado" name="estado">
                    <option value="Activo" selected>Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Registrar</button>
        </form>
    </div>
</div>

</body>
</html>
