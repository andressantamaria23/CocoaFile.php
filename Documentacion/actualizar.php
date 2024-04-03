<?php


require "../conexion.php";





if ($conectar->connect_error) {
    die("Conexión fallida: " . $conectar->connect_error);
}



$sql = "SELECT * FROM documentos";
$result = $conn->query($sql);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"]; // ID del registro a actualizar
    $cod_contrato = $_POST["cod_contrato"];
    $fecha_inicio = $_POST["fecha_inicio"];
    $fecha_fin = $_POST["fecha_fin"];
    $fkcod_documento = $_POST["fkcodigo_documento"];
   
    $sql = "UPDATE documentos SET 
 
    cod_contrato = '$cod_contrato', 
    fecha_inicio = '$fecha_inicio', 
    fecha_fin = '$fecha_fin' 
    fkcod_documento = '$fkcod_documento' 
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