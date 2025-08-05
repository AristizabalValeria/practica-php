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
        <h2 class="text-2xl font-bold mb-6 text-center">Lista de centros de trabajo</h2>

        <table class="table-auto w-full text-sm ">
        <thead class="table-dark">
            <tr>
                <th class="border border-gray-300 px-4 py-2">ID</th>
                <th class="border border-gray-300 px-4 py-2">Nombre</th>
                <th class="border border-gray-300 px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($centros_trabajo)): ?>
                <?php foreach ($centros_trabajo as $ct): ?>
                    <tr>
                        <td class="border px-4 py-2"><?= htmlspecialchars($ct->getId()) ?></td>
                        <td class="border px-4 py-2"><?= htmlspecialchars($ct->getNombre()) ?></td>
                        
                        <td class="border px-4 py-2 flex justify-center space-x-3">
                            <a href="/editar.php?cedula=<?= $ct->getId() ?>" class="bg-yellow-500 text-white px-3 p-1 rounded">
                                Editar
                            </a>
                            <a href="/eliminar.php?cedula=<?= urlencode($ct->getId()) ?>" class="bg-red-500 text-white px-3 p-1 rounded" onclick="return confirm('¿Seguro que deseas eliminar este centro de trabajo?');">
                                Eliminar
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8" class="text-center">No se encontraron centros de trabajo</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </div>
</body>
