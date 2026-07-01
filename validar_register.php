<?php
session_start();
require "conexion.php";

$nombre = trim($_POST["nombre"]);
$apellido = trim($_POST["apellido"]);
$email = trim($_POST["email"]);
$documento = trim($_POST["documento"]);
$telefono = trim($_POST["telefono"]);
$fecha = trim($_POST["fecha_nacimiento"]);
$genero = $_POST["genero"] ?? "";
$contrasena = trim($_POST["contrasena"]);

if ($nombre === "") {
    $mensaje = "El nombre no puede estar vacío";
} elseif ($apellido === "") {
    $mensaje = "El apellido no puede estar vacío";
} elseif ($email === "") {
    $mensaje = "El correo no puede estar vacío";
} elseif ($documento === "") {
    $mensaje = "El documento no puede estar vacío";
} elseif ($telefono === "") {
    $mensaje = "El teléfono no puede estar vacío";
} elseif ($fecha === "") {
    $mensaje = "Debes seleccionar tu fecha de nacimiento";
} elseif ($genero === "") {
    $mensaje = "Debes seleccionar un género";
} elseif ($contrasena === "") {
    $mensaje = "La contraseña no puede estar vacía";
} elseif (strlen($contrasena) < 8) {
    $mensaje = "La contraseña debe tener mínimo 8 caracteres";
} elseif (!preg_match("/[a-zA-Z]/", $contrasena)) {
    $mensaje = "La contraseña debe tener al menos una letra";
} elseif (!preg_match("/[0-9]/", $contrasena)) {
    $mensaje = "La contraseña debe tener al menos un número";
} elseif (!preg_match("/[^a-zA-Z0-9]/", $contrasena)) {
    $mensaje = "La contraseña debe tener al menos un caracter especial";
} else {

    // Verificar si el email ya existe
    $check = $conexion->prepare("SELECT id FROM usuarios WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        $mensaje = "Ya existe una cuenta con ese correo";
    } else {
        $contrasenaEncriptada = password_hash($contrasena, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nombre, apellido, email, documento, genero, telefono, fecha_nacimiento, contrasena)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ssssssss", $nombre, $apellido, $email, $documento, $genero, $telefono, $fecha, $contrasenaEncriptada);

        if ($stmt->execute()) {
            $_SESSION["mensaje"] = "¡Registro exitoso! Ya puedes iniciar sesión";
            $_SESSION["tipo_mensaje"] = "mensaje-exito";
            $stmt->close();
            $conexion->close();
            header("Location: login.php");
            exit;
        } else {
            $mensaje = "Error al registrar: " . $stmt->error;
        }

        $stmt->close();
    }

    $check->close();
}

$_SESSION["mensaje"] = $mensaje;
$_SESSION["tipo_mensaje"] = "mensaje-error";
$conexion->close();
header("Location: index.php");
exit;
?>