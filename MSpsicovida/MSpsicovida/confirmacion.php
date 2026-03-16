<?php
session_start();

// Si no hay datos de cita o pago, redirigir al inicio del flujo
if (!isset($_SESSION['cita']) || !isset($_SESSION['pago'])) {
    header("Location: cita.php");
    exit;
}

$cita = $_SESSION['cita'];
$pago = $_SESSION['pago'];

// Limpiar la sesión después de mostrar la confirmación (opcional, pero buena práctica)
unset($_SESSION['cita']);
unset($_SESSION['pago']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cita Confirmada | Psicovida</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<header>
    <img src="img/logotipo.png" class="logo" alt="Psicovida">
    <nav>
        <a href="index.php">Inicio</a>
        <a href="psicologos.php">Psicólogos</a>
        <a href="cita.php">Agendar Cita</a>
        <a href="contacto.php">Contacto</a>
    </nav>
</header>

<section>
    <h1>✅ Cita Confirmada</h1>

    <div style="background:#e6ffe6; padding:25px; border-radius:12px; margin:30px auto; max-width:600px; text-align:left; box-shadow:0 4px 10px rgba(0,0,0,0.1);">
        <h3>¡Gracias por tu confianza, <?= htmlspecialchars($cita['nombre']) ?>! 💙</h3>
        
        <p>Tu cita psicológica ha sido agendada y pagada con éxito.</p>
        
        <strong>Detalles de la cita:</strong><br>
        - Paciente: <?= htmlspecialchars($cita['nombre']) ?><br>
        - Psicólogo/a: <?= htmlspecialchars($cita['psicologo']) ?><br>
        - Fecha: <?= htmlspecialchars($cita['fecha']) ?><br>
        - Hora: <?= htmlspecialchars($cita['hora']) ?><br>
        - Reprogramar: <?= htmlspecialchars($cita['reprogramar']) ?><br><br>
        
        <strong>Datos del pago (simulado):</strong><br>
        - Titular: <?= htmlspecialchars($pago['titular']) ?><br>
        - Tarjeta terminada en: **** **** **** <?= htmlspecialchars($pago['tarjeta']) ?><br>
        - Monto: $500 MXN<br><br>
        
        <p>Te enviaremos un recordatorio por correo o WhatsApp antes de tu cita.</p>
    </div>

    <a href="index.php">
        <button style="padding:12px 30px; font-size:18px;">Volver al Inicio</button>
    </a>
</section>

<footer>
    <p>© 2026 Psicovida | Bienestar emocional</p>
</footer>

</body>
</html>