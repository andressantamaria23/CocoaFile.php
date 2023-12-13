<?php
require "../conexion.php";

$cantidad_producto = $_POST['cantidad_producto'];
$fecha_salida = $_POST['fecha_salida'];


$insert = "INSERT INTO salida(cantidad_producto,fecha_salida) VALUES('$cantidad_producto','$fecha_salida')";

$query = mysqli_query($conectar,$insert);

if($query){

    echo '<script>alert("Se almacenaron los datos correctamente");</script>';

}else{
    echo '<script>alert("Error al conectarse a la BD");</script>';
}

?>