<?php
// Array de psicólogos (fácil de agregar más después)
$psicologos = [
    [
        'nombre' => 'Dra. Ana López',
        'especialidad' => 'Especialista en ansiedad, estrés y bienestar emocional.',
        'descripcion' => 'Brinda terapia individual enfocada en el desarrollo personal.',
        'imagen' => 'img/psicologa.png'
    ],
    [
        'nombre' => 'Dr. Carlos Martínez',
        'especialidad' => 'Especialista en terapia familiar y manejo emocional.',
        'descripcion' => 'Apoya procesos de comunicación y resolución de conflictos.',
        'imagen' => 'img/psicologo.jpeg'
    ]
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Psicólogos | Psicovida</title>
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
    <h1>Nuestros Psicólogos</h1>

    <div class="contenedor">
        <?php foreach ($psicologos as $psicologo): ?>
            <div class="card">
                <img src="<?= htmlspecialchars($psicologo['imagen']) ?>" alt="<?= htmlspecialchars($psicologo['nombre']) ?>">
                <h3><?= htmlspecialchars($psicologo['nombre']) ?></h3>
                <p><strong><?= htmlspecialchars($psicologo['especialidad']) ?></strong></p>
                <p><?= htmlspecialchars($psicologo['descripcion']) ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <?php if (empty($psicologos)): ?>
        <p style="text-align:center; color:#666;">Actualmente no hay psicólogos registrados.</p>
    <?php endif; ?>
</section>

<footer>
    <p>© 2026 Psicovida | Bienestar emocional</p>
</footer>

</body>
</html>