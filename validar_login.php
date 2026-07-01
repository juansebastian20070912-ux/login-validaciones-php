<?php
session_start();
require "conexion.php";

$email = trim($_POST["email"]);
$contrasena = trim($_POST["contrasena"]);

if ($email === "") {
    $_SESSION["mensaje"] = "El correo no puede estar vacío";
    $_SESSION["tipo_mensaje"] = "mensaje-error";
    header("Location: login.php");
    exit;
}

if ($contrasena === "") {
    $_SESSION["mensaje"] = "La contraseña no puede estar vacía";
    $_SESSION["tipo_mensaje"] = "mensaje-error";
    header("Location: login.php");
    exit;
}

$sql = "SELECT * FROM usuarios WHERE email = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 0) {
    $_SESSION["mensaje"] = "No existe una cuenta con ese correo";
    $_SESSION["tipo_mensaje"] = "mensaje-error";
} else {
    $usuario = $resultado->fetch_assoc();

    if (password_verify($contrasena, $usuario["contrasena"])) {
        $_SESSION["usuario"] = $usuario;
        $stmt->close();
        $conexion->close();
        header("Location: dashboard.php");
        exit;
    } else {
        $_SESSION["mensaje"] = "Contraseña incorrecta";
        $_SESSION["tipo_mensaje"] = "mensaje-error";
    }
}

$stmt->close();
$conexion->close();
header("Location: login.php");
exit;
?>