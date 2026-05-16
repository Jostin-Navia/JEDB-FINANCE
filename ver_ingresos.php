<?php
include("../config/db.php");
header("Content-Type: application/json");

$resultado = $conexion->query("SELECT * FROM ingresos");

$datos = [];

while ($fila = $resultado->fetch_assoc()) {
    $datos[] = $fila;
}

echo json_encode($datos);
?>