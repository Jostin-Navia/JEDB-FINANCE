<?php
include("../config/db.php");
header("Content-Type: application/json");

$ingresos = $conexion->query("SELECT SUM(monto) as total FROM ingresos")->fetch_assoc();
$gastos = $conexion->query("SELECT SUM(monto) as total FROM gastos")->fetch_assoc();

$totalIngresos = $ingresos['total'] ?? 0;
$totalGastos = $gastos['total'] ?? 0;

$resumen = [
    "total_ingresos" => $totalIngresos,
    "total_gastos" => $totalGastos,
    "balance" => $totalIngresos - $totalGastos
];

echo json_encode($resumen);
?>