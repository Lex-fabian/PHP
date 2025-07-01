<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="public/style/productos.css">
</head>
<body>
    <div class="cabeza">
        <h1>TecnoEvolution</h1>
        <a href="app.php?paginas=inicio" class="btn-cerrar-sesion">Cerrar Sesión</a>
    </div>

    <div class="cuerpo">
        <div class="crud-productos">
            <h2>Gestión de Productos</h2>
            <?php if (!empty($mensaje)): ?>
                <div class="mensaje-producto"><?php echo $mensaje; ?></div>
            <?php endif; ?>

            <form method="post" enctype="multipart/form-data" action="app.php?paginas=productos<?php echo (isset($productoEditar)) ? '&accion=editar&id=' . $productoEditar['id'] : '&accion=crear'; ?>" class="form-producto">
                <input type="text" name="nombre_producto" placeholder="Nombre" required value="<?php echo $productoEditar['nombre_producto'] ?? ''; ?>">
                <input type="text" name="descripcion" placeholder="Descripción" required value="<?php echo $productoEditar['descripcion'] ?? ''; ?>">
                <input type="number" step="0.01" name="precio" placeholder="Precio" required value="<?php echo $productoEditar['precio'] ?? ''; ?>">
                <input type="file" name="imagen" accept="image/*">
                <?php if (isset($productoEditar) && !empty($productoEditar['imagen'])): ?>
                    <img src="<?php echo $productoEditar['imagen']; ?>" alt="Imagen actual" class="img-mini">
                <?php endif; ?>
                <button type="submit"><?php echo isset($productoEditar) ? 'Actualizar' : 'Agregar'; ?></button>
                <?php if (isset($productoEditar)): ?>
                    <a href="app.php?paginas=productos" class="btn-cancelar">Cancelar</a>
                <?php endif; ?>
            </form>

            <table class="tabla-productos">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td>
                            <?php if (!empty($producto['imagen'])): ?>
                                <img src="<?php echo $producto['imagen']; ?>" alt="Imagen" class="img-mini">
                            <?php else: ?>
                                <span style="color:#888;">Sin imagen</span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo htmlspecialchars($producto['nombre_producto']); ?></td>
                        <td><?php echo htmlspecialchars($producto['descripcion']); ?></td>
                        <td>$<?php echo number_format($producto['precio'], 2); ?></td>
                        <td>
                            <a href="app.php?paginas=productos&accion=editar&id=<?php echo $producto['id']; ?>" class="btn-editar">Editar</a>
                            <a href="app.php?paginas=productos&accion=eliminar&id=<?php echo $producto['id']; ?>" class="btn-eliminar" onclick="return confirm('¿Eliminar producto?');">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>