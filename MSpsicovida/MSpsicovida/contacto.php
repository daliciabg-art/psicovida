<?php
// Fecha actual simple (en español manual)
$meses = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'];
$dia = date('d');
$mes = $meses[(int)date('m') - 1];
$anio = date('Y');
$fecha_hoy = "$dia de $mes de $anio";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto | Psicovida</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<header>
    <img src="img/logotipo.png" class="logo">
    <nav>
        <a href="index.php">Inicio</a>
        <a href="psicologos.php">Psicólogos</a>
        <a href="cita.php">Agendar Cita</a>
        <a href="misionvision.php">Misión y Visión</a>
        <a href="contacto.php">Contacto</a>
    </nav>
</header>

<section>
    <h1>Contáctanos</h1>

    <p>Estamos aquí para ayudarte en tu camino hacia el bienestar emocional. ¡Escríbenos hoy mismo!</p>

    <h3>📞 Teléfono</h3>
    <p>5522632689</p>

    <h3>💬 WhatsApp</h3>
    <p>+52 55 2263 2689</p>

    <h3>✉ Correo electrónico</h3>
    <p>psicovida@gmail.com</p>

    <p style="margin-top:30px; font-style:italic;">
        <strong>Fecha de hoy:</strong> <?= $fecha_hoy ?>  
        (Estamos disponibles para atenderte en este momento)
    </p>
</section>

<footer>
    <p>© 2026 Psicovida | Bienestar emocional</p>
</footer>

</body>
</html>