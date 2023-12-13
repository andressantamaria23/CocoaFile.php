<?php
require "../conexion.php";

$codigo_postal = $_POST['codigo_postal'];
$nombre_proveedor = $_POST['nombre_proveedor'];
$telefono_proveedor = $_POST['telefono_proveedor'];
$fkcod_contrato_comercial = $_POST['fkcod_contrato_comercial'];

$insert = "INSERT INTO campesinos(codigo_postal,nombre_proveedor,telefono_proveedor,fkcod_contrato_comercial) 
VALUES('$codigo_postal','$nombre_proveedor','$telefono_proveedor','$fkcod_contrato_comercial')";
  
$query = mysqli_query($conectar,$insert);

if($query){

    echo '<script>alert("Se almacenaron los datos correctamente");</script>';

}else{
    echo '<script>alert("Error al conectarse a la BD");</script>';
}

?>