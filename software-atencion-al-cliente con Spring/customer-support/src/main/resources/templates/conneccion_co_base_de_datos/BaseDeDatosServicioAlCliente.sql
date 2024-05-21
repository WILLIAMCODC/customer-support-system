-- Crear la base de datos
CREATE DATABASE servicio_al_cliente;

-- Usar la base de datos creada
USE servicio_al_cliente;

-- Crear tabla jugador
CREATE TABLE jugador (
    correo_electronico VARCHAR(100) PRIMARY KEY,
    contrasena_cifrada VARCHAR(100),
    nombre VARCHAR(50)
);

-- Crear tabla cuenta
CREATE TABLE cuenta (
    id_cuenta INT AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(50),
    fecha_creacion DATE,
    ultimo_inicio_sesion DATETIME,
    correo_electronico_vinculado VARCHAR(100),
    FOREIGN KEY (correo_electronico_vinculado) REFERENCES jugador(correo_electronico)
);

-- Crear tabla historial_compras
CREATE TABLE historial_compras (
    id_compra INT AUTO_INCREMENT PRIMARY KEY,
    fecha_compra DATE,
    valor_compra DECIMAL(10, 2),
    tarjeta_cifrado VARCHAR(100),
    id_cuenta INT,
    FOREIGN KEY (id_cuenta) REFERENCES cuenta(id_cuenta)
);

-- Crear tabla asesor
CREATE TABLE asesor (
    id_asesor INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50)
);

-- Crear tabla historial_acceso_historial_compras
CREATE TABLE historial_acceso_historial_compras (
    id_historial_acceso INT AUTO_INCREMENT PRIMARY KEY,
    id_compra INT,
    id_asesor INT,
    FOREIGN KEY (id_compra) REFERENCES historial_compras(id_compra),
    FOREIGN KEY (id_asesor) REFERENCES asesor(id_asesor)
);

-- Crear tabla solicitud
CREATE TABLE solicitud (
    id_solicitud INT AUTO_INCREMENT PRIMARY KEY,
    fecha_solicitud DATE,
    tipo_solicitud VARCHAR(50),
    id_cuenta INT,
    id_asesor INT,
    FOREIGN KEY (id_cuenta) REFERENCES cuenta(id_cuenta),
    FOREIGN KEY (id_asesor) REFERENCES asesor(id_asesor)
);




