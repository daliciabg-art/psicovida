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
    <title>Misión y Visión | Psicovida</title>
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
    <h1>Misión</h1>
    <p>
        Brindar atención psicológica profesional accesible y de calidad,
        promoviendo el bienestar emocional y la salud mental mediante
        un sistema digital seguro y confiable.
    </p>

    <h1>Visión</h1>
    <p>
        Ser una plataforma reconocida por facilitar el acceso a servicios
        psicológicos, contribuyendo al desarrollo emocional y la calidad
        de vida de las personas.
    </p>

    <p style="margin-top:40px; color:#1e3a8a; font-weight:bold;">
        En Psicovida seguimos comprometidos con estos principios desde el <?= $fecha_hoy ?>.
    </p>
</section>

<footer>
    <p>© 2026 Psicovida | Bienestar emocional</p>
</footer>

</body>
</html>