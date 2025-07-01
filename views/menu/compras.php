<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="public/style/compras.css">
</head>
<body>
    <div class="cabeza">
        <h1>🛒 Carrito de Compras</h1>
        <a href="app.php?paginas=inicio" class="btn-volver">Volver a la tienda</a>
    </div>
    <div class="cuerpo">
        <div class="carrito-contenido">
            <h2>Productos en tu carrito</h2>
            <table class="tabla-carrito" id="tablaCarrito">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Quitar</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <div class="carrito-total">
                Total: $<span id="carritoTotal">0.00</span>
            </div>
            <button class="btn-comprar" id="btnComprar" disabled>Comprar</button>
        </div>
    </div>
    <script>
        function renderCarrito() {
            const carrito = JSON.parse(localStorage.getItem('carrito') || '[]');
            const tbody = document.querySelector('#tablaCarrito tbody');
            tbody.innerHTML = '';
            let total = 0;
            carrito.forEach((item, idx) => {
                total += parseFloat(item.precio);
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${item.nombre}</td>
                    <td>$${parseFloat(item.precio).toFixed(2)}</td>
                    <td><button class="btn-quitar" data-idx="${idx}">&times;</button></td>
                `;
                tbody.appendChild(tr);
            });
            document.getElementById('carritoTotal').textContent = total.toFixed(2);
            document.getElementById('btnComprar').disabled = carrito.length === 0;
        }
        renderCarrito();

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('btn-quitar')) {
                const idx = e.target.getAttribute('data-idx');
                let carrito = JSON.parse(localStorage.getItem('carrito') || '[]');
                carrito.splice(idx, 1);
                localStorage.setItem('carrito', JSON.stringify(carrito));
                renderCarrito();
            }
        });

        document.getElementById('btnComprar').onclick = function() {
            alert('¡Gracias por tu compra!');
            localStorage.removeItem('carrito');
            renderCarrito();
        };
    </script>
</body>
</html>
