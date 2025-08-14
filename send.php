<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {

    // Configuración del correo
    $destino = "ventas@tvnetnaranjos.com"; // Cambiar al correo que quieras recibir los mensajes
    $asunto = "Nuevo mensaje desde Landing TVNET";

    // Recibir datos del formulario
    $nombre = strip_tags(trim($_POST["nombre"]));
    $correo = filter_var(trim($_POST["correo"]), FILTER_SANITIZE_EMAIL);
    $mensaje = trim($_POST["mensaje"]);

    // Validaciones básicas
    if (empty($nombre) || empty($mensaje) || !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        // Redirige con error si algún campo está vacío o correo inválido
        header("Location: index.html?error=1");
        exit;
    }

    // Contenido del correo
    $contenido = "Nombre: $nombre\n";
    $contenido .= "Correo: $correo\n";
    $contenido .= "Mensaje:\n$mensaje\n";

    // Encabezados
    $headers = "From: $nombre <$correo>";

    // Enviar correo
    if(mail($destino, $asunto, $contenido, $headers)) {
        // Éxito
        header("Location: index.html?success=1");
    } else {
        // Error al enviar
        header("Location: index.html?error=1");
    }

} else {
    // Si acceden por GET, redirige al inicio
    header("Location: index.html");
}
?>
