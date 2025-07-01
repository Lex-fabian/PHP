<?php
require_once __DIR__ . '/../controllers/productoControl.php';

function rutaProductos() {
    $accion = isset($_GET['accion']) ? $_GET['accion'] : 'listar';
    $mensaje = '';
    if ($accion === 'crear' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = isset($_POST['nombre_producto']) ? $_POST['nombre_producto'] : '';
        $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
        $precio = isset($_POST['precio']) ? $_POST['precio'] : '';
        $imagen = '';
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $nombreArchivo = uniqid() . '_' . basename($_FILES['imagen']['name']);
            $rutaDestino = 'public/img/' . $nombreArchivo;
            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino)) {
                $imagen = $rutaDestino;
            }
        }
        if (crearProducto($nombre, $descripcion, $precio, $imagen)) {
            $mensaje = 'Producto creado correctamente.';
        } else {
            $mensaje = 'Error al crear producto.';
        }
    }
    if ($accion === 'editar' && isset($_GET['id'])) {
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = isset($_POST['nombre_producto']) ? $_POST['nombre_producto'] : '';
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
            $precio = isset($_POST['precio']) ? $_POST['precio'] : '';
            $imagen = null;
            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                $nombreArchivo = uniqid() . '_' . basename($_FILES['imagen']['name']);
                $rutaDestino = 'public/img/' . $nombreArchivo;
                if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino)) {
                    $imagen = $rutaDestino;
                }
            }
            if (editarProducto($id, $nombre, $descripcion, $precio, $imagen)) {
                $mensaje = 'Producto actualizado correctamente.';
            } else {
                $mensaje = 'Error al actualizar producto.';
            }
        }
        $productoEditar = obtenerProducto($id);
    }
    if ($accion === 'eliminar' && isset($_GET['id'])) {
        $id = $_GET['id'];
        if (borrarProducto($id)) {
            $mensaje = 'Producto eliminado correctamente.';
        } else {
            $mensaje = 'Error al eliminar producto.';
        }
    }
    $productos = listarProductos();
    include __DIR__ . '/../views/menu/productos.php';
}
?>
