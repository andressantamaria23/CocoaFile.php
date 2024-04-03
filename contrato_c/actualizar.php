<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cocoa";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT * FROM contrato_comercial";
$result = $conn->query($sql);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"]; // ID del registro a actualizar
    $cod_contrato = $_POST["fkcod_contrato"];
    $monto_total = $_POST["monto_total"];
    $acuerdos = $_POST["acuerdos"];
   
    $sql = "UPDATE contrato_comercial SET 
 
    fkcod_contrato = '$fkcod_contrato', 
    monto_total = '$monto_total', 
    acuerdos = '$acuerdos' 
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