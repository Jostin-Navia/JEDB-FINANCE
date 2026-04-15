<?php
// Se incluye la conexión a la base de datos
include 'db.php';

// Se obtiene el método de la petición (GET o POST)
$method = $_SERVER['REQUEST_METHOD'];

// Si el método es POST se crea un nuevo gasto
if ($method == 'POST') {
    
    // Se capturan los datos enviados en formato JSON
    $data = json_decode(file_get_contents("php://input"));
    
    $descripcion = $data->descripcion;
    $monto = $data->monto;

    // Consulta SQL para insertar el gasto
    $sql = "INSERT INTO gastos (descripcion, monto) VALUES ('$descripcion','$monto')";

    // Se ejecuta la consulta y se valida si fue exitosa
    if ($conexion->query($sql)) {
        echo json_encode(["mensaje" => "Gasto creado"]);
    } else {
        echo json_encode(["error" => "Error al crear gasto"]);
    }
}

// Si el método es GET se listan los gastos
if ($method == 'GET') {
    
    // Consulta para obtener todos los gastos
    $result = $conexion->query("SELECT * FROM gastos");

    $datos = [];

    // Se recorren los resultados y se guardan en un arreglo
    while($row = $result->fetch_assoc()){
        $datos[] = $row;
    }

    // Se devuelve la información en formato JSON
    echo json_encode($datos);
}
?>