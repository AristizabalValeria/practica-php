<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-sm p-4">
        <h2 class="mb-4">Editar Usuario</h2>

        <form method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($usuario->getId()) ?>">
            <input type="hidden" name="cedula" value="<?= htmlspecialchars($usuario->getCedula()) ?>">

            <div class="mb-3">
                <label class="form-label">Nombre completo</label>
                <input type="text" class="form-control" name="nombre_completo" 
                       value="<?= htmlspecialchars($usuario->getNombreCompleto()) ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Teléfono</label>
                <input type="text" class="form-control" name="telefono" 
                       value="<?= htmlspecialchars($usuario->getTelefono()) ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Correo</label>
                <input type="email" class="form-control" name="correo" 
                       value="<?= htmlspecialchars($usuario->getCorreo()) ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Saldo</label>
                <input type="number" step="0.01" class="form-control" name="saldo" 
                       value="<?= htmlspecialchars($usuario->getSaldo()) ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Rol</label>
                <select name="rol" class="form-select">
                    <option value="Usuario" <?= $usuario->getRol() === 'Usuario' ? 'selected' : '' ?>>Usuario</option>
                    <option value="Administrador" <?= $usuario->getRol() === 'Administrador' ? 'selected' : '' ?>>Administrador</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Estado</label>
                <select name="estado" class="form-select">
                    <option value="Activo" <?= $usuario->getEstado() === 'Activo' ? 'selected' : '' ?>>Activo</option>
                    <option value="Inactivo" <?= $usuario->getEstado() === 'Inactivo' ? 'selected' : '' ?>>Inactivo</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Centro de trabajo</label>
                <input type="number" class="form-control" name="id_centro_trabajo" 
                       value="<?= htmlspecialchars($usuario->getIdCentroTrabajo()) ?>" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Actualizar</button>
        </form>
    </div>
</div>

</body>
</html>