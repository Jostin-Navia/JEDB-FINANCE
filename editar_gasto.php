<?php
include("../config/db.php");
header("Content-Type: application/json");

$id = $_POST['id'] ?? null;
$descripcion = $_POST['descripcion'] ?? null;
$monto = $_POST['monto'] ?? null;
$fecha = $_POST['fecha'] ?? null;

if ($id && $descripcion && $monto && $fecha) {

    $stmt = $conexion->prepare("UPDATE gastos SET descripcion=?, monto=?, fecha=? WHERE id=?");
    $stmt->bind_param("sdsi", $descripcion, $monto, $fecha, $id);

    if ($stmt->execute()) {
        echo json_encode(["mensaje" => "Gasto actualizado"]);
    } else {
        echo json_encode(["error" => "Error al actualizar"]);
    }

    $stmt->close();

} else {
    echo json_encode(["error" => "Faltan datos"]);
}
?>