<?php
session_start();
if (isset($_SESSION["usuario"])) {
    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Iniciar Sesión</title>
</head>
<body>

  <div class="contenedor">
    <h1 class="titulo">Iniciar Sesión</h1>
    <p class="subtitulo">Ingresa tus datos para acceder</p>

    <?php if (isset($_SESSION["mensaje"])): ?>
        <p class="mensaje <?= $_SESSION['tipo_mensaje'] ?>"><?= $_SESSION["mensaje"] ?></p>
        <?php unset($_SESSION["mensaje"]); unset($_SESSION["tipo_mensaje"]); ?>
    <?php endif; ?>

    <form action="validar_login.php" id="formulario_login" method="post">

      <div class="campo">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="correo@ejemplo.com">
      </div>

      <div class="campo">
        <label for="contrasena">Contraseña</label>
        <input type="password" id="contrasena" name="contrasena" placeholder="Tu contraseña">
      </div>

      <button type="submit" class="boton">Iniciar Sesión</button>

    </form>

    <p class="enlace">¿No tienes cuenta? <a href="register.php">Regístrate</a></p>

  </div>

<script src="login.js"></script>
</body>
</html>