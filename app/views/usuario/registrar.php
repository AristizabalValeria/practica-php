<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="w-full max-w-2xl bg-white shadow-lg rounded-lg p-8">
    <h2 class="text-3xl font-bold mb-8 text-center">Registro de Usuario</h2>
    
    <form action="/registrar.php" method="POST" class="space-y-5">

        <div>
            <label for="cedula" class="block text-gray-700 font-medium mb-1">Cédula</label>
            <input type="text" id="cedula" name="cedula" required
                   class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 outline-none">
        </div>

        <div>
            <label for="nombre_completo" class="block text-gray-700 font-medium mb-1">Nombre completo</label>
            <input type="text" id="nombre_completo" name="nombre_completo" required
                   class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 outline-none">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="telefono" class="block text-gray-700 font-medium mb-1">Teléfono</label>
                <input type="text" id="telefono" name="telefono" required
                       class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            <div>
                <label for="correo" class="block text-gray-700 font-medium mb-1">Correo</label>
                <input type="email" id="correo" name="correo" required
                       class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 outline-none">
            </div>
        </div>

        <div>
            <label for="clave" class="block text-gray-700 font-medium mb-1">Contraseña</label>
            <input type="password" id="clave" name="clave" required
                   class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 outline-none">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="id_centro_trabajo" class="block text-gray-700 font-medium mb-1">Centro de trabajo</label>
                <select id="id_centro_trabajo" name="id_centro_trabajo"
                        class="w-full border border-gray-300 rounded-lg p-2 bg-white focus:ring-2 focus:ring-blue-500 outline-none">
                    <?php foreach ($centros_trabajo as $ct): ?>
                        <option value="<?= htmlspecialchars($ct->getId()) ?>">
                            <?= htmlspecialchars($ct->getNombre()) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="saldo" class="block text-gray-700 font-medium mb-1">Saldo inicial</label>
                <input type="number" step="0.01" id="saldo" name="saldo" value="0.00"
                       class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 outline-none">
            </div>
        </div>

        <div>
            <label for="QR" class="block text-gray-700 font-medium mb-1">Código QR (opcional)</label>
            <input type="text" id="QR" name="QR"
                   class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 outline-none">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="rol" class="block text-gray-700 font-medium mb-1">Rol</label>
                <select id="rol" name="rol"
                        class="w-full border border-gray-300 rounded-lg p-2 bg-white focus:ring-2 focus:ring-blue-500 outline-none">
                    <option value="Usuario" selected>Usuario</option>
                    <option value="Administrador">Administrador</option>
                </select>
            </div>
            <div>
                <label for="estado" class="block text-gray-700 font-medium mb-1">Estado</label>
                <select id="estado" name="estado"
                        class="w-full border border-gray-300 rounded-lg p-2 bg-white focus:ring-2 focus:ring-blue-500 outline-none">
                    <option value="Activo" selected>Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select>
            </div>
        </div>

        <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg shadow-md transition-all">
            Registrar
        </button>
    </form>
</div>

</body>
</html>
