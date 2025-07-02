<?php
session_start();

define('BASE_URL', 'http://localhost/PHP/');

require_once 'config/conexion.php';
require_once 'routes/inicioRoutes.php';
require_once 'routes/productoRoutes.php';
require_once 'routes/comprasRoutes.php';
require_once 'routes/contactoRoutes.php';

$paginas = $_GET['paginas'] ?? 'inicio';

if ($paginas === 'inicio') {
    rutaInicio();
} elseif ($paginas === 'productos') {
    rutaProductos();
} elseif ($paginas === 'compras') {
    rutaCompras();
} elseif ($paginas === 'contacto') {
    rutaContacto();
} else {
    // Página no encontrada, redirigir a inicio
    header('Location: app.php?paginas=inicio');
    exit;
}
?>
