<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gray-100 flex flex-col">

<div class="container mx-auto mt-10 bg-white p-7">
    <h2 class="text-2xl font-bold mb-6 text-center">Lista de Usuarios</h2>

    <!-- Filtros -->
    <form method="GET" class="flex flex-wrap gap-4 mb-6">
        <div class="col-md-4">
            <input type="text" name="cedula" class="flex-1 border rounded p-2" 
                   placeholder="Buscar por cédula" 
                   value="<?= htmlspecialchars($_GET['cedula'] ?? '') ?>">
        </div>
        <div class="col-md-4">
            <input type="text" name="correo" class="flex-1 border rounded p-2" 
                   placeholder="Buscar por correo" 
                   value="<?= htmlspecialchars($_GET['correo'] ?? '') ?>">
        </div>
        <div class="col-md-4">
            <button type="submit" class=" flex-1 bg-green-500 text-white px-4 p-2 rounded">Filtrar</button>
        </div>
    </form>

    <div class="mb-3">
        <a href="/registrar.php" class="bg-blue-500 text-white px-4 p-2 rounded">Crear Usuario</a>
        <a href="/centroTrabajo/index.php" class="bg-red-500 text-white px-4 p-2 rounded">Gestionar centros de trabajo</a>
    </div>

    <table class="table-auto w-full text-sm ">
        <thead class="table-dark">
                <tr>
                <th class="border border-gray-300 px-4 py-2">ID</th>
                <th class="border border-gray-300 px-4 py-2">Cédula</th>
                <th class="border border-gray-300 px-4 py-2">Nombre</th>
                <th class="border border-gray-300 px-4 py-2">Correo</th>
                <!-- <th class="border border-gray-300 px-4 py-2">Centro de trabajo</th> -->
                <th class="border border-gray-300 px-4 py-2">Saldo</th>
                <th class="border border-gray-300 px-4 py-2">Rol</th>
                <th class="border border-gray-300 px-4 py-2">Estado</th>
                <th class="border border-gray-300 px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($usuarios)): ?>
                <?php foreach ($usuarios as $u): ?>
                    <tr>
                        <td class="border px-4 py-2"><?= htmlspecialchars($u->getId()) ?></td>
                        <td class="border px-4 py-2"><?= htmlspecialchars($u->getCedula()) ?></td>
                        <td class="border px-4 py-2"><?= htmlspecialchars($u->getNombreCompleto()) ?></td>
                        <td class="border px-4 py-2"><?= htmlspecialchars($u->getCorreo()) ?></td>
                        <!-- <td class="border px-4 py-2">
                            
                        </td> -->
                        <td class="border px-4 py-2"><?= htmlspecialchars($u->getSaldo()) ?></td>
                        <td class="border px-4 py-2"><?= htmlspecialchars($u->getRol()) ?></td>
                        <td class="border px-4 py-2"><?= htmlspecialchars($u->getEstado()) ?></td>
                        <td class="border px-4 py-2 flex justify-center space-x-3">
                            <a href="/editar.php?cedula=<?= $u->getCedula() ?>" class="bg-yellow-500 text-white px-3 p-1 rounded">
                                Editar
                            </a>
                            <a href="/eliminar.php?cedula=<?= urlencode($u->getCedula()) ?>" class="bg-red-500 text-white px-3 p-1 rounded" onclick="return confirm('¿Seguro que deseas eliminar este usuario?');">
                                Eliminar
                            </a>
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
