<?php
// Se incluye la conexión a la base de datos
include 'db.php';

// Se obtiene el método de la petición (GET o POST)
$method = $_SERVER['REQUEST_METHOD'];

// Si el método es POST se crea un nuevo ingreso
if ($method == 'POST') {
    
    // Se capturan los datos enviados en formato JSON
    $data = json_decode(file_get_contents("php://input"));
    
    $descripcion = $data->descripcion;
    $monto = $data->monto;

    // Consulta SQL para insertar el ingreso
    $sql = "INSERT INTO ingresos (descripcion, monto) VALUES ('$descripcion','$monto')";

    // Se ejecuta la consulta y se valida si fue exitosa
    if ($conexion->query($sql)) {
        echo json_encode(["mensaje" => "Ingreso creado"]);
    } else {
        echo json_encode(["error" => "Error al crear ingreso"]);
    }
}

// Si el método es GET se listan los ingresos
if ($method == 'GET') {
    
    // Consulta para obtener todos los ingresos
    $result = $conexion->query("SELECT * FROM ingresos");

    $datos = [];

    // Se recorren los resultados y se guardan en un arreglo
    while($row = $result->fetch_assoc()){
        $datos[] = $row;
    }

    // Se devuelve la información en formato JSON
    echo json_encode($datos);
}
?>