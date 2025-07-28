CREATE TABLE centro_trabajo(
	Id INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE usuario(
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Cedula VARCHAR(20) NOT NULL UNIQUE,
    Nombre_completo VARCHAR(100) NOT NULL,
    Telefono VARCHAR(20) NOT NULL UNIQUE,
    Correo VARCHAR(50) NOT NULL UNIQUE,
    Saldo DECIMAL(10,2) DEFAULT 0.00,
    QR VARCHAR(255) DEFAULT NULL,
    Clave VARCHAR(255) NOT NULL,
    Rol ENUM('Administrador', 'Usuario') NOT NULL,
	Fecha_registro DATETIME NOT NULL,
    Estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo'

    Id_centro_trabajo INT NOT NULL,
    FOREIGN KEY (Id) REFERENCES centro_trabajo(Id)
);

CREATE TABLE recarga(
    Id_recarga INT AUTO_INCREMENT PRIMARY KEY,
    Monto DECIMAL(10,2) NOT NULL,
    Fecha_hora DATETIME NOT NULL,
    Medio_pago NOT NULL,
    Estado ENUM('Aprobado', 'Pendiente', 'No aprobado') DEFAULT 'Pendiente',
    Fecha_solicitud DATETIME NOT NULL,
    Fecha_aprobacion DATETIME DEFAULT NULL,

    Id_usuario INT NOT NULL,
    FOREIGN KEY (Id_usuario) REFERENCES usuario(Id)
);

CREATE TABLE reserva(
    Id_reserva INT AUTO_INCREMENT PRIMARY KEY,
    Fecha_reserva DATETIME NOT NULL,
    Estado ENUM('Confirmada', 'Aplicada') DEFAULT 'Confirmada',

    Id_usuario INT NOT NULL,
    FOREIGN KEY (Id_usuario) REFERENCES usuario(Id)
);

CREATE TABLE historial(
    Id_historial INT AUTO_INCREMENT PRIMARY KEY,
    Tipo ENUM('Recarga', 'Recarga Aprobada', 'Recarga No Aprobada', 'Reserva', 'Reserva Aplicada', 'Reserva Cancelada', 'Nuevo Usuario') NOT NULL
    Monto DECIMAL(10,2) DEFAULT 0.00,
    Fecha_hora DATETIME NOT NULL,
    Estado ENUM('Confirmada', 'Aplicada', 'Pendiente', 'No aprobado') DEFAULT 'Pendiente',
    Detalles VARCHAR(255) DEFAULT NULL,


    Id_usuario INT NOT NULL,
    FOREIGN KEY (Id_usuario) REFERENCES usuario(Id)
);