<?php
include("../config/db.php");
header("Content-Type: application/json");

$correo = $_POST['correo'] ?? null;
$password = $_POST['password'] ?? null;

if ($correo && $password) {

    $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();

    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {

        $usuario = $resultado->fetch_assoc();

        if (password_verify($password, $usuario['password'])) {

            echo json_encode([
                "mensaje" => "Login exitoso",
                "usuario_id" => $usuario['id']
            ]);

        } else {
            echo json_encode(["error" => "Contraseña incorrecta"]);
        }

    } else {
        echo json_encode(["error" => "Usuario no encontrado"]);
    }

    $stmt->close();

} else {
    echo json_encode(["error" => "Faltan datos"]);
}

$conexion->close();
?>