<?php
include("../config/db.php");
header("Content-Type: application/json");

$usuario = $_POST['usuario'] ?? null;
$correo = $_POST['correo'] ?? null;
$password = $_POST['password'] ?? null;

if ($usuario && $correo && $password) {

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conexion->prepare("INSERT INTO usuarios (usuario, correo, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $usuario, $correo, $passwordHash);

    if ($stmt->execute()) {
        echo json_encode([
            "mensaje" => "Usuario registrado correctamente"
        ]);
    } else {
        echo json_encode([
            "error" => "Error al registrar",
            "detalle" => $stmt->error
        ]);
    }

    $stmt->close();

} else {
    echo json_encode([
        "error" => "Faltan datos"
    ]);
}

$conexion->close();
?>