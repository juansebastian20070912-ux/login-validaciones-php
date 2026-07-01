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
  <title>Registro</title>
</head>
<body>

  <div class="contenedor">
    <h1 class="titulo">Formulario de Registro</h1>
    <p class="subtitulo">Completa tus datos para crear una cuenta</p>

    <?php if (isset($_SESSION["mensaje"])): ?>
        <p class="mensaje <?= $_SESSION['tipo_mensaje'] ?>"><?= $_SESSION["mensaje"] ?></p>
        <?php unset($_SESSION["mensaje"]); unset($_SESSION["tipo_mensaje"]); ?>
    <?php endif; ?>

    <form action="validar_register.php" id="formulario_registro" method="post">

      <div class="fila-doble">
        <div class="campo">
          <label for="nombre">Nombre</label>
          <input type="text" id="nombre" name="nombre" placeholder="Tu nombre">
        </div>
        <div class="campo">
          <label for="apellido">Apellido</label>
          <input type="text" id="apellido" name="apellido" placeholder="Tu apellido">
        </div>
      </div>

      <div class="campo">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="correo@ejemplo.com">
      </div>

      <div class="campo">
        <label for="documento">Documento</label>
        <input type="text" id="documento" name="documento" placeholder="Número de documento">
      </div>

      <div class="campo">
        <label>Género</label>
        <div class="grupo-radio">
          <label><input type="radio" name="genero" value="masculino"> Masculino</label>
          <label><input type="radio" name="genero" value="femenino"> Femenino</label>
        </div>
      </div>

      <div class="fila-doble">
        <div class="campo">
          <label for="telefono">Teléfono</label>
          <input type="text" id="telefono" name="telefono" placeholder="300 000 0000">
        </div>
        <div class="campo">
          <label for="fecha_nacimiento">Fecha de Nacimiento</label>
          <input type="date" id="fecha_nacimiento" name="fecha_nacimiento">
        </div>
      </div>

      <div class="campo">
        <label for="contrasena">Contraseña</label>
        <input type="password" id="contrasena" name="contrasena" placeholder="Mínimo 8 caracteres">

        <div class="requisitos">
          <p id="req-longitud"><span class="circulo"></span> Mínimo 8 caracteres</p>
          <p id="req-letra"><span class="circulo"></span> Al menos una letra</p>
          <p id="req-numero"><span class="circulo"></span> Al menos un número</p>
          <p id="req-especial"><span class="circulo"></span> Al menos un caracter especial</p>
        </div>
      </div>

      <button type="submit" class="boton">Registrarse</button>

    </form>

    <p class="enlace">¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></p>

  </div>

<!-- <script src="register.js"></script> -->
</body>
</html>