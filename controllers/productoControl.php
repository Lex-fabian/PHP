<?php
require_once __DIR__ . '/../models/producto/productoModel.php';

function listarProductos() {
    $productoModel = new productoModel();
    return $productoModel->obtenerProductos();
}

function obtenerProducto($id) {
    $productoModel = new productoModel();
    return $productoModel->obtenerProductoPorId($id);
}

function crearProducto($nombre, $descripcion, $precio, $imagen) {
    $productoModel = new productoModel();
    return $productoModel->agregarProducto($nombre, $descripcion, $precio, $imagen);
}

function editarProducto($id, $nombre, $descripcion, $precio, $imagen = null) {
    $productoModel = new productoModel();
    return $productoModel->actualizarProducto($id, $nombre, $descripcion, $precio, $imagen);
}

function borrarProducto($id) {
    $productoModel = new productoModel();
    return $productoModel->eliminarProducto($id);
}
?>
