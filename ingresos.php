<?php
include("../config/db.php");
header("Content-Type: application/json");

$usuario_id = $_POST['usuario_id'] ?? null;
$descripcion = $_POST['descripcion'] ?? null;
$monto = $_POST['monto'] ?? null;
$fecha = $_POST['fecha'] ?? null;

if ($usuario_id && $descripcion && $monto && $fecha) {

    $stmt = $conexion->prepare("INSERT INTO ingresos (usuario_id, descripcion, monto, fecha) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isds", $usuario_id, $descripcion, $monto, $fecha);

    if ($stmt->execute()) {
        echo json_encode([
            "mensaje" => "Ingreso registrado correctamente"
        ]);
    } else {
        echo json_encode([
            "error" => "Error al registrar ingreso",
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