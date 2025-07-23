<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - TecnoEvolution</title>
    <link rel="stylesheet" href="public/style/inicio.css">
</head>
<body>
    <div class="cabeza">
        <h1>TecnoEvolution</h1>
        <a href="app.php?paginas=inicio" class="btn-login-cabecera">Volver al Inicio</a>
    </div>

    <main class="cuerpo" style="padding: 20px; color: #fff; text-align: center;">
        <h2>Contáctanos</h2>
        <p>¿Tienes preguntas o necesitas una cotización? Escríbenos o visítanos.</p>

        <div style="background: rgba(255,255,255,0.1); padding: 20px; border-radius: 10px; margin: 20px auto; max-width: 600px; text-align: left;">
            <p><strong>📱 Móvil:</strong> +593 99 999 9999</p>
            <p><strong>☎️ Oficina:</strong> (02) 222 58452</p>
            <p><strong>📧 Correo:</strong> contacto@TecnoEvolution.com</p>
            <p><strong>📍 Dirección:</strong> Av. de las Gardeñas 123, Ambato, Ecuador</p>
            <p><strong>🌐 Redes Sociales:</strong>
                <a href="https://facebook.com" target="_blank" style="color: #a9aac0;">Facebook</a> |
                <a href="https://twitter.com" target="_blank" style="color: #a9aac0;">Twitter</a> |
                <a href="https://instagram.com" target="_blank" style="color: #a9aac0;">Instagram</a>
            </p>
        </div>

        <form method="post" style="background: rgba(255,255,255,0.1); padding: 20px; border-radius: 10px; margin: 20px auto; max-width: 600px;">
            <input type="text" name="nombre" placeholder="Tu nombre" required style="width: 100%; padding: 10px; margin: 5px 0; border: none; border-radius: 5px;">
            <input type="email" name="correo" placeholder="tunombre@email.com" required style="width: 100%; padding: 10px; margin: 5px 0; border: none; border-radius: 5px;">
            <input type="text" name="asunto" placeholder="Motivo de contacto" required style="width: 100%; padding: 10px; margin: 5px 0; border: none; border-radius: 5px;">
            <textarea name="mensaje" rows="5" placeholder="Escribe tu mensaje aquí..." required style="width: 100%; padding: 10px; margin: 5px 0; border: none; border-radius: 5px; resize: vertical;"></textarea>
            <button type="submit" style="background: #04345c; color: #fff; border: none; border-radius: 5px; padding: 12px 20px; cursor: pointer; margin-top: 10px;">Enviar mensaje</button>
        </form>
    </main>
</body>
</html>


