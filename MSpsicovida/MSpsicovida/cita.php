<?php
session_start();

$errores = [];
$nombre = '';
$psicologo = '';
$fecha = '';
$hora = '';
$reprogramar = 'No';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $nombre      = trim($_POST['nombre'] ?? '');
    $psicologo   = trim($_POST['psicologo'] ?? '');
    $fecha       = trim($_POST['fecha'] ?? '');
    $hora        = trim($_POST['hora'] ?? '');
    $reprogramar = trim($_POST['reprogramar'] ?? 'No');

    if (empty($nombre)) {
        $errores[] = "El nombre del paciente es obligatorio.";
    }
    if (empty($psicologo) || $psicologo === '') {
        $errores[] = "Debes seleccionar un psicólogo.";
    }
    if (empty($fecha)) {
        $errores[] = "La fecha es obligatoria.";
    }
    if (empty($hora)) {
        $errores[] = "El horario es obligatorio.";
    }

    if (empty($errores)) {
        $_SESSION['cita'] = [
            'nombre'      => $nombre,
            'psicologo'   => $psicologo,
            'fecha'       => $fecha,
            'hora'        => $hora,
            'reprogramar' => $reprogramar
        ];
        
        header("Location: pago.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Cita | Psicovida</title>
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
    <h1>Agendar Cita</h1>

    <?php if (!empty($errores)): ?>
        <div style="color: red; background: #ffebee; padding: 15px; border-radius: 8px; margin: 20px auto; max-width: 500px;">
            <strong>Por favor corrige los siguientes errores:</strong><br>
            <ul>
                <?php foreach ($errores as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form id="formCita" method="POST" action="cita.php">

        <label>Nombre del paciente:</label><br>
        <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($nombre) ?>" required><br><br>

        <label>Selecciona Psicólogo:</label><br>
        <select id="psicologo" name="psicologo" required>
            <option value="">Seleccione</option>
            <option value="Dra. Ana López"    <?= $psicologo === 'Dra. Ana López' ? 'selected' : '' ?>>Dra. Ana López</option>
            <option value="Dr. Carlos Martínez" <?= $psicologo === 'Dr. Carlos Martínez' ? 'selected' : '' ?>>Dr. Carlos Martínez</option>
        </select><br><br>

        <label>Fecha:</label><br>
        <input type="date" id="fecha" name="fecha" value="<?= htmlspecialchars($fecha) ?>" required><br><br>

        <label>Horario:</label><br>
        <select id="hora" name="hora" required>
            <option value="10:00 AM"    <?= $hora === '10:00 AM' ? 'selected' : '' ?>>10:00 AM</option>
            <option value="12:00 PM"    <?= $hora === '12:00 PM' ? 'selected' : '' ?>>12:00 PM</option>
            <option value="4:00 PM"     <?= $hora === '4:00 PM' ? 'selected' : '' ?>>4:00 PM</option>
        </select><br><br>

        <label>¿Desea reprogramar una cita?</label><br>
        <select id="reprogramar" name="reprogramar">
            <option value="No"  <?= $reprogramar === 'No' ? 'selected' : '' ?>>No</option>
            <option value="Sí"  <?= $reprogramar === 'Sí' ? 'selected' : '' ?>>Sí</option>
        </select><br><br>

        <button type="submit" id="btnCita">Realizar el pago</button>

    </form>
</section>

<footer>
    <p>© 2026 Psicovida | Bienestar emocional</p>
</footer>

</body>
</html>