<?php

require_once __DIR__ . '/../controllers/inicioControl.php';

function rutaInicio() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usuario = $_POST['usuario'] ?? '';
        $clave = $_POST['contrasena'] ?? '';
        $mensaje = procesarLogin($usuario, $clave);
    }
    $productos = verProductos();
    include __DIR__ . '/../views/inicio.php';
}
?>