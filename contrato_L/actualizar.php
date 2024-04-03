<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cocoafile";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT * FROM contrato_laboral";
$result = $conn->query($sql);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"]; 
    $fkcod_contrato = $_POST["fkcod_contrato"];
    $salario = $_POST["salario"];
    $funciones = $_POST["funciones"];
   
    $sql = "UPDATE contrato_laboral SET 
 
    fkcod_contrato = '$fkcod_contrato', 
    salario = '$salario', 
    funciones = '$funciones' 
    WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Registro actualizado con éxito.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();
?>