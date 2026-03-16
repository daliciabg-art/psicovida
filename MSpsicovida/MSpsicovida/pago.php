<?php
session_start();

if (!isset($_SESSION['cita'])) {
    header("Location: cita.php");
    exit;
}

$errores = [];
$titular = '';
$tarjeta = '';
$fechaTarjeta = '';
$cvv = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $titular     = trim($_POST['titular'] ?? '');
    $tarjeta     = trim($_POST['tarjeta'] ?? '');
    $fechaTarjeta = trim($_POST['fechaTarjeta'] ?? '');
    $cvv         = trim($_POST['cvv'] ?? '');

    if (empty($titular)) {
        $errores[] = "El nombre del titular es obligatorio.";
    }
    if (empty($tarjeta) || strlen($tarjeta) !== 16 || !ctype_digit($tarjeta)) {
        $errores[] = "El número de tarjeta debe tener exactamente 16 dígitos numéricos.";
    }
    if (empty($fechaTarjeta)) {
        $errores[] = "La fecha de expiración es obligatoria.";
    }
    if (empty($cvv) || strlen($cvv) !== 3 || !ctype_digit($cvv)) {
        $errores[] = "El CVV debe tener exactamente 3 dígitos numéricos.";
    }

    if (empty($errores)) {
        // Guardamos todo en sesión para confirmacion.php
        $_SESSION['pago'] = [
            'titular' => $titular,
            'tarjeta' => substr($tarjeta, -4), // solo últimos 4 dígitos por "seguridad"
            'fechaTarjeta' => $fechaTarjeta,
            'cvv' => '***' // no guardamos el cvv real
        ];

        header("Location: confirmacion.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago de Consulta | Psicovida</title>
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
    <h1>Pago de Consulta</h1>

    <div style="background:#f0f9ff; padding:15px; border-radius:8px; margin:20px auto; max-width:500px; text-align:left;">
        <strong>Resumen de tu cita:</strong><br>
        Paciente: <?= htmlspecialchars($_SESSION['cita']['nombre']) ?><br>
        Psicólogo: <?= htmlspecialchars($_SESSION['cita']['psicologo']) ?><br>
        Fecha: <?= htmlspecialchars($_SESSION['cita']['fecha']) ?><br>
        Hora: <?= htmlspecialchars($_SESSION['cita']['hora']) ?><br>
        Reprogramar: <?= htmlspecialchars($_SESSION['cita']['reprogramar']) ?>
    </div>

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

    <form id="formPago" method="POST" action="pago.php">

        <label>Nombre del titular:</label><br>
        <input type="text" id="titular" name="titular" value="<?= htmlspecialchars($titular) ?>" required><br><br>

        <label>Número de tarjeta:</label><br>
        <input type="text" id="tarjeta" name="tarjeta" maxlength="16" value="<?= htmlspecialchars($tarjeta) ?>" required><br><br>

        <label>Fecha de expiración:</label><br>
        <input type="month" id="fechaTarjeta" name="fechaTarjeta" value="<?= htmlspecialchars($fechaTarjeta) ?>" required><br><br>

        <label>CVV:</label><br>
        <input type="text" id="cvv" name="cvv" maxlength="3" value="<?= htmlspecialchars($cvv) ?>" required><br><br>

        <label>Monto:</label><br>
        <input type="text" value="$500 MXN" readonly><br><br>

        <button type="submit" id="btnPago">Continuar el pago</button>

    </form>
</section>

<footer>
    <p>© 2026 Psicovida | Bienestar emocional</p>
</footer>

</body>
</html>