<?php
// Se incluye la conexión a la base de datos
include 'db.php';

// Se obtiene la suma total de ingresos
$ingresos = $conexion->query("SELECT SUM(monto) as total FROM ingresos")->fetch_assoc();

// Se obtiene la suma total de gastos
$gastos = $conexion->query("SELECT SUM(monto) as total FROM gastos")->fetch_assoc();

// Se construye el resumen financiero
$resumen = [
    "total_ingresos" => $ingresos['total'],
    "total_gastos" => $gastos['total'],
    "balance" => $ingresos['total'] - $gastos['total']
];

// Se devuelve el resultado en formato JSON
echo json_encode($resumen);
?>