<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "jedb_finance";

$conexion = new mysqli($host, $user, $password, $database);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>// Actualización final evidencia módulos integrados