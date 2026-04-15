<?php
// Este archivo permite registrar un nuevo usuario en la base de datos

// Incluir el archivo de conexión
include("db.php");

// Obtener los datos enviados desde Postman en formato JSON
$data = json_decode(file_get_contents("php://input"), true);

// Guardar los datos en variables
$usuario = $data['usuario'];
$password = $data['password'];

// Crear consulta SQL para insertar el usuario
$sql = "INSERT INTO usuarios (usuario, password) VALUES ('$usuario', '$password')";

// Ejecutar la consulta
if ($conexion->query($sql) === TRUE) {
    // Si se ejecuta correctamente, enviar mensaje de éxito
    echo json_encode(["mensaje" => "Usuario registrado correctamente"]);
} else {
    // Si ocurre un error, enviar mensaje de error
    echo json_encode(["mensaje" => "Error al registrar"]);
}
?>