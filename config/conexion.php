<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'crud');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root12345');

try {
    $conexion = new PDO(
        'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8',
        DB_USER,
        DB_PASSWORD
    );
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Error de conexión: ' . $e->getMessage();
    exit;
}

function probarConexion() {
    global $conexion;
    if ($conexion) {
        echo 'Conexión exitosa a la base de datos.';
    } else {
        echo 'Error al conectar a la base de datos.';
    }
}

function getConexion() {
    global $conexion;
    return $conexion;
}
?>