<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="public/style/inicio.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <div class="cabeza">
        <h1>TecnoEvolution</h1>
        <button id="btnMostrarLogin" class="btn-login-cabecera">Iniciar Sesión</button>
    </div>

    <div class="cuerpo">
        <?php if (isset($productos) && is_array($productos) && count($productos) > 0): ?>
            <div class="grid-productos">
                <?php foreach ($productos as $i => $producto): ?>
                    <div class="producto-card">
                        <?php if (!empty($producto['imagen'])): ?>
                            <img src="<?php echo htmlspecialchars($producto['imagen']); ?>" alt="Imagen" class="img-mini">
                        <?php endif; ?>
                        <strong><?php echo htmlspecialchars($producto['nombre_producto']); ?></strong>
                        <br>
                        <span><?php echo htmlspecialchars($producto['descripcion']); ?></span>
                        <br>
                        $<?php echo number_format($producto['precio'], 2); ?>
                        <br>
                        <button class="btn-agregar-carrito" data-id="<?php echo $producto['id']; ?>"
                            data-nombre="<?php echo htmlspecialchars($producto['nombre_producto']); ?>"
                            data-precio="<?php echo $producto['precio']; ?>">
                            Agregar al carrito
                        </button>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="lista-productos">
                <p>No hay productos disponibles.</p>
            </div>
        <?php endif; ?>
    </div>

    <a href="app.php?paginas=compras" class="carrito-flotante" title="Ver carrito">
        <i class="fa-solid fa-cart-shopping"></i>
        <span class="carrito-contador" id="carritoContador">0</span>
    </a>

    <div id="modalLogin" class="modal-login">
        <div class="modal-login-content">
            <button id="btnCerrarLogin" class="cerrar-login">&times;</button>
            <h2>Iniciar Sesión</h2>
            <?php if (isset($mensaje)): ?>
                <div style="color: #d8000c; margin-bottom: 10px;">
                    <?php echo $mensaje; ?>
                </div>
            <?php endif; ?>
            <form method="POST" action="">
                <label for="usuario">Usuario:</label>
                <input type="text" id="usuario" name="usuario" required>
                <br>
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" required>
                <br>
                <button type="submit">Entrar</button>
            </form>
        </div>
    </div>

    <script>
        const btnMostrarLogin = document.getElementById('btnMostrarLogin');
        const modalLogin = document.getElementById('modalLogin');
        const btnCerrarLogin = document.getElementById('btnCerrarLogin');

        btnMostrarLogin.onclick = () => {
            modalLogin.style.display = 'flex';
        };
        btnCerrarLogin.onclick = () => {
            modalLogin.style.display = 'none';
        };
        window.onclick = function(event) {
            if (event.target === modalLogin) {
                modalLogin.style.display = 'none';
            }
        };

        const carritoContador = document.getElementById('carritoContador');
        function actualizarContador() {
            const carrito = JSON.parse(localStorage.getItem('carrito') || '[]');
            carritoContador.textContent = carrito.length;
        }
        actualizarContador();

        document.querySelectorAll('.btn-agregar-carrito').forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const nombre = this.getAttribute('data-nombre');
                const precio = this.getAttribute('data-precio');
                let carrito = JSON.parse(localStorage.getItem('carrito') || '[]');
                carrito.push({id: id, nombre: nombre, precio: precio});
                localStorage.setItem('carrito', JSON.stringify(carrito));
                actualizarContador();
                alert('Producto agregado al carrito');
            });
        });
    </script>
</body>
</html>