<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Psicovida | Inicio</title>

<link rel="stylesheet" href="css/estilos.css">
<script src="js/funciones.js" defer></script>

</head>

<body>

<header>

<img src="img/logotipo.png" class="logo">

<nav>
<a href="index.php">Inicio</a>
<a href="psicologos.php">Psicólogos</a>
<a href="cita.php">Agendar Cita</a>
<a href="contacto.php">Contacto</a>
</nav>

</header>

<section>

<h1>Bienvenido a Psicovida</h1>
<?php
setlocale(LC_TIME, 'es_MX.UTF-8');
$fecha_actual = strftime('%A, %d de %B de %Y');
echo "<p><strong>Hoy es: " . ucfirst($fecha_actual) . "</strong></p>";
?>
<p>
Psicovida es un espacio dedicado al bienestar emocional y la salud mental.
Nuestro objetivo es brindar atención psicológica profesional mediante un
sistema de citas en línea fácil, rápido y seguro.
</p>

<img src="img/terapia.png" alt="Sesión psicológica">

</section>

<section>

<h2>Conoce Psicovida</h2>

<video controls width="700">
<source src="videos/presentacion.mp4" type="video/mp4">
</video>

</section>

<footer>
<p>© 2026 Psicovida | Bienestar emocional</p>
</footer>

</body>
</html>