<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">Lista de Usuarios</h2>

    <!-- Filtros -->
    <form method="GET" class="row mb-4">
        <div class="col-md-4">
            <input type="text" name="cedula" class="form-control" 
                   placeholder="Buscar por cédula" 
                   value="<?= htmlspecialchars($_GET['cedula'] ?? '') ?>">
        </div>
        <div class="col-md-4">
            <input type="text" name="correo" class="form-control" 
                   placeholder="Buscar por correo" 
                   value="<?= htmlspecialchars($_GET['correo'] ?? '') ?>">
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary w-100">Filtrar</button>
        </div>
    </form>

    <!-- Botón para crear -->
    <div class="mb-3">
        <a href="/register.php" class="btn btn-success">Crear Usuario</a>
    </div>

    <!-- Tabla de usuarios -->
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Saldo</th>
                <th>Rol</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($usuarios)): ?>
                <?php foreach ($usuarios as $u): ?>
                    <tr>
                        <td><?= htmlspecialchars($u->getId()) ?></td>
                        <td><?= htmlspecialchars($u->getCedula()) ?></td>
                        <td><?= htmlspecialchars($u->getNombreCompleto()) ?></td>
                        <td><?= htmlspecialchars($u->getCorreo()) ?></td>
                        <td><?= htmlspecialchars($u->getSaldo()) ?></td>
                        <td><?= htmlspecialchars($u->getRol()) ?></td>
                        <td><?= htmlspecialchars($u->getEstado()) ?></td>
                        <td>
                            <a href="/editar.php?id=<?= $u->getId() ?>" class="btn btn-warning btn-sm">✏ Editar</a>
                            <a href="/eliminar.php?id=<?= $u->getId() ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este usuario?');">🗑 Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8" class="text-center">No se encontraron usuarios</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>
