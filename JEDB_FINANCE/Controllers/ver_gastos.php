<?php
include("../config/db.php");
header("Content-Type: application/json");

$resultado = $conexion->query("SELECT * FROM gastos");

$datos = [];

while ($fila = $resultado->fetch_assoc()) {
    $datos[] = $fila;
}

echo json_encode($datos);
?>