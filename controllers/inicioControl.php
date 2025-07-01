<?php
require_once __DIR__ . '/../config/conexion.php';
require_once __DIR__ . '/../models/producto/productoModel.php';
require_once __DIR__ . '/../models/usuario/usuarioModel.php';

function verProductos() {
    $productoModel = new productoModel();
    return $productoModel->obtenerProductos();
}

function procesarLogin($usuario, $clave) {
    $usuarioModel = new UsuarioModel();
    $user = $usuarioModel->credenciales($usuario, $clave);
    if ($user) {
        $_SESSION['usuario'] = $user['usuario'];
        header('Location: app.php?paginas=productos');
        exit;
    } else {
        return 'Usuario o contraseña incorrectos, o usuario inactivo.';
    }
}
?>
