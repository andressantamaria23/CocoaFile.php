<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cocoafile";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT * FROM capacitaciones";
$result = $conn->query($sql);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id = $_POST["id"]; // ID del registro a actualizar
    $numeroReferencia = $_POST["numero_referencia"];
    $horaCapacitacion = $_POST["hora_capacitacion"];
    $fechaCapacitacion = $_POST["fecha_capacitacion"];
    $codigoCampesino = $_POST["fkcodigo_campesino"];
    $codigoDocumento = $_POST["fkcodigo_documento"];
    $tipoCapacitacion = $_POST["tipo_capacitacion"];

    $sql = "UPDATE capacitaciones SET 
            numero_referencia = '$numeroReferencia', 
            hora_capacitacion = '$horaCapacitacion', 
            fecha_capacitacion = '$fechaCapacitacion', 
            codigo_campesino = '$codigoCampesino', 
            codigo_documento = '$codigoDocumento', 
            tipo_capacitacion = '$tipoCapacitacion' 
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado con éxito.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>