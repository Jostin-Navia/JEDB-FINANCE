<?php
// Este archivo permite validar el inicio de sesión de un usuario

// Incluir la conexión a la base de datos
include("db.php");

// Obtener los datos enviados desde Postman
$data = json_decode(file_get_contents("php://input"), true);

// Guardar datos en variables
$usuario = $data['usuario'];
$password = $data['password'];

// Crear consulta SQL para buscar el usuario
$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND password='$password'";

// Ejecutar consulta
$resultado = $conexion->query($sql);

// Verificar si existe el usuario
if ($resultado->num_rows > 0) {
    // Si existe, autenticación correcta
    echo json_encode(["mensaje" => "Autenticación satisfactoria"]);
} else {
    // Si no existe, error de autenticación
    echo json_encode(["mensaje" => "Error en la autenticación"]);
}
?>