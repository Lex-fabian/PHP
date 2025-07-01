<?php

require_once __DIR__ . '/../../config/conexion.php';

class productoModel {
    private $conexion;

    public function __construct() {
        $this->conexion = getConexion();
    }

    public function obtenerProductos() {
        $query = $this->conexion->prepare('SELECT * FROM producto');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerProductoPorId($id) {
        $query = $this->conexion->prepare('SELECT * FROM producto WHERE id = ' . $id);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function agregarProducto($nombre, $descripcion, $precio, $imagen) {
        $query = $this->conexion->prepare('INSERT INTO producto (nombre_producto, descripcion, precio, imagen) VALUES (:nombre_producto, :descripcion, :precio, :imagen)');
        $query->bindParam(':nombre_producto', $nombre);
        $query->bindParam(':descripcion', $descripcion);
        $query->bindParam(':precio', $precio);
        $query->bindParam(':imagen', $imagen);
        return $query->execute();
    }

    public function actualizarProducto($id, $nombre, $descripcion, $precio, $imagen = null) {
        if ($imagen) {
            $query = $this->conexion->prepare('UPDATE producto SET nombre_producto = :nombre_producto, descripcion = :descripcion, precio = :precio, imagen = :imagen WHERE id = :id');
            $query->bindParam(':imagen', $imagen);
        } else {
            $query = $this->conexion->prepare('UPDATE producto SET nombre_producto = :nombre_producto, descripcion = :descripcion, precio = :precio WHERE id = :id');
        }
        $query->bindParam(':id', $id);
        $query->bindParam(':nombre_producto', $nombre);
        $query->bindParam(':descripcion', $descripcion);
        $query->bindParam(':precio', $precio);
        return $query->execute();
    }

    public function eliminarProducto($id) {
        $query = $this->conexion->prepare('DELETE FROM producto WHERE id = ' . $id);
        return $query->execute();
    }
}
?>