<?php
include("../config/db.php");
header("Content-Type: application/json");

$id = $_POST['id'] ?? null;

if ($id) {

    $stmt = $conexion->prepare("DELETE FROM ingresos WHERE id=?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo json_encode(["mensaje" => "Ingreso eliminado"]);
    } else {
        echo json_encode(["error" => "Error al eliminar"]);
    }

    $stmt->close();

} else {
    echo json_encode(["error" => "Falta el id"]);
}
?>