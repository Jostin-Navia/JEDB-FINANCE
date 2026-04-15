<?php
// Datos de conexión al servidor
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$base_datos = "api_usuarios";

// Crear conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "jedb_finance");

// Verificar si la conexión fue exitosa
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>