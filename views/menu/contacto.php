<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - TecnoEvolution</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <header>
        <h1>TecnoEvolution</h1>
        <nav>
            <ul>
                <li><a href="index.html">Inicio</a></li>
                <li><a href="contacto.html" class="activo">Contacto</a></li>
                <li><a href="servicios.html""></a></li>
            </ul>
        </nav>
    </header>

    <main class="contacto">
        <h2>Contáctanos</h2>
        <p>¿Tienes preguntas o necesitas una cotización? Escríbenos o visítanos.</p>

        <div class="info-contacto">
            <p><strong>📱 Móvil:</strong> +593 99 999 9999</p>
            <p><strong>☎️ Oficina:</strong> (02) 222 2222</p>
            <p><strong>📧 Correo:</strong> contacto@techzone.com</p>
            <p><strong>📍 Dirección:</strong> Av. de la Tecnología 123, Quito, Ecuador</p>
            <p><strong>🌐 Redes Sociales:</strong>
                <a href="https://facebook.com" target="_blank">Facebook</a> |
                <a href="https://twitter.com" target="_blank">Twitter</a> |
                <a href="https://instagram.com" target="_blank">Instagram</a>
            </p>
        </div>

        <form class="formulario-contacto">
            <label for="nombre">Nombre completo:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" required>

            <label for="correo">Correo electrónico:</label>
            <input type="email" id="correo" name="correo" placeholder="tunombre@email.com" required>

            <label for="asunto">Asunto:</label>
            <input type="text" id="asunto" name="asunto" placeholder="Motivo de contacto" required>

            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" rows="5" placeholder="Escribe tu mensaje aquí..." required></textarea>

            <button type="submit">Enviar mensaje</button>
        </form>
    </main>

    <footer>
        <p>&copy; Todos los derechos reservados.</p>
        
    </footer>
    
</body>
</html>


