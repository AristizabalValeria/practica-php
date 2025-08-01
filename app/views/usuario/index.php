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
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $u): ?>
                <tr>
                    <td><?= htmlspecialchars($u->getId()) ?></td>
                    <td><?= htmlspecialchars($u->getCedula()) ?></td>
                    <td><?= htmlspecialchars($u->getNombreCompleto()) ?></td>
                    <td><?= htmlspecialchars($u->getCorreo()) ?></td>
                    <td><?= htmlspecialchars($u->getSaldo()) ?></td>
                    <td><?= htmlspecialchars($u->getRol()) ?></td>
                    <td><?= htmlspecialchars($u->getEstado()) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
