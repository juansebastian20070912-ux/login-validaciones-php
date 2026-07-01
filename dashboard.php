<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit;
}

$u = $_SESSION["usuario"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Bienvenido</title>
</head>
<body>

  <div class="contenedor">
    <h1 class="titulo">¡Bienvenido, <?= $u["nombre"] ?>!</h1>
    <p class="subtitulo">Esta es tu información de cuenta</p>

    <div class="info-usuario">

      <div class="info-fila">
        <span class="info-label">Nombre      </span>
        <span class="info-valor"><?=    $u["nombre"] . " " . $u["apellido"] ?></span>
      </div>

      <div class="info-fila">
        <span class="info-label">Correo</span>
        <span class="info-valor"><?= $u["email"] ?></span>
      </div>

      <div class="info-fila">
        <span class="info-label">Documento</span>
        <span class="info-valor"><?= $u["documento"] ?></span>
      </div>

      <div class="info-fila">
        <span class="info-label">Género</span>
        <span class="info-valor"><?= ucfirst($u["genero"]) ?></span>
      </div>

      <div class="info-fila">
        <span class="info-label">Teléfono</span>
        <span class="info-valor"><?= $u["telefono"] ?></span>
      </div>

      <div class="info-fila">
        <span class="info-label">Fecha de nacimiento</span>
        <span class="info-valor"><?= date("d/m/Y", strtotime($u["fecha_nacimiento"])) ?></span>
      </div>

    </div>

    <a href="logout.php" class="boton" style="display:block; text-align:center; text-decoration:none; margin-top:20px;">Cerrar Sesión</a>
  </div>

</body>
</html>