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
     <footer style="background: linear-gradient(135deg, #04345c 0%, #1c1d34 100%); color: #a9aac0; padding: 40px 20px 20px 20px; margin-top: 50px;">
        <div style="max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px;">
            
            <!-- Información de Contacto -->
            <div>
                <h3 style="color: #fff; margin-bottom: 20px; font-size: 1.2em;">📞 Contacto</h3>
                <p style="margin: 8px 0;"><strong>📱 Móvil:</strong> +593 99 999 9999</p>
                <p style="margin: 8px 0;"><strong>☎️ Oficina:</strong> (02) 222 58452</p>
                <p style="margin: 8px 0;"><strong>📧 Email:</strong> contacto@TecnoEvolution.com</p>
                <p style="margin: 8px 0;"><strong>📍 Dirección:</strong> Av. de las Gardeñas 123, Ambato, Ecuador</p>
            </div>

            <!-- Enlaces Rápidos -->
            <div>
                <h3 style="color: #fff; margin-bottom: 20px; font-size: 1.2em;">🔗 Enlaces Rápidos</h3>
                <p style="margin: 8px 0;"><a href="app.php?paginas=inicio" style="color: #a9aac0; text-decoration: none;">🏠 Inicio</a></p>
                <p style="margin: 8px 0;"><a href="app.php?paginas=compras" style="color: #a9aac0; text-decoration: none;">🛒 Carrito</a></p>
                <p style="margin: 8px 0;"><a href="app.php?paginas=contacto" style="color: #a9aac0; text-decoration: none;">📞 Contacto</a></p>
                <p style="margin: 8px 0;"><a href="#" onclick="document.getElementById('btnMostrarLogin').click();" style="color: #a9aac0; text-decoration: none;">🔐 Administrador</a></p>
            </div>

            <!-- Redes Sociales -->
            <div>
                <h3 style="color: #fff; margin-bottom: 20px; font-size: 1.2em;">🌐 Síguenos</h3>
                <div style="display: flex; gap: 15px; flex-wrap: wrap;">
                    <a href="https://facebook.com" target="_blank" style="color: #a9aac0; text-decoration: none; padding: 8px 12px; background: rgba(255,255,255,0.1); border-radius: 5px; transition: background 0.3s;" onmouseover="this.style.background='rgba(255,255,255,0.2)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'">📘 Facebook</a>
                    <a href="https://twitter.com" target="_blank" style="color: #a9aac0; text-decoration: none; padding: 8px 12px; background: rgba(255,255,255,0.1); border-radius: 5px; transition: background 0.3s;" onmouseover="this.style.background='rgba(255,255,255,0.2)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'">🐦 Twitter</a>
                    <a href="https://instagram.com" target="_blank" style="color: #a9aac0; text-decoration: none; padding: 8px 12px; background: rgba(255,255,255,0.1); border-radius: 5px; transition: background 0.3s;" onmouseover="this.style.background='rgba(255,255,255,0.2)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'">📷 Instagram</a>
                </div>
            </div>

            <!-- Información de la Empresa -->
            <div>
                <h3 style="color: #fff; margin-bottom: 20px; font-size: 1.2em;">🏢 TecnoEvolution</h3>
                <p style="margin: 8px 0; line-height: 1.6;">Tu tienda de confianza para productos tecnológicos de última generación.</p>
                <p style="margin: 8px 0; font-size: 0.9em;">Horarios de atención:</p>
                <p style="margin: 4px 0; font-size: 0.9em;">📅 Lun - Vie: 9:00 AM - 6:00 PM</p>
                <p style="margin: 4px 0; font-size: 0.9em;">📅 Sáb: 9:00 AM - 2:00 PM</p>
            </div>
        </div>

        <!-- Copyright -->
        <div style="text-align: center; margin-top: 30px; padding-top: 20px; border-top: 1px solid rgba(169, 170, 192, 0.3);">
            <p style="margin: 0; font-size: 0.9em;">&copy; 2025 TecnoEvolution. Todos los derechos reservados. | Desarrollado con ❤️</p>
        </div>
    </footer>
</body>
</html>