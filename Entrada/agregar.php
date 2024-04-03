<?php
require "../conexion.php";

$cantidad_producto = $_POST['cantidad_producto'];
$fecha_entrada = $_POST['fecha_entrada'];
$fkcod_compra = $_POST['fkcod_compra'];


$insert = "INSERT INTO entrada(cantidad_producto,fecha_entrada,fkcod_compra) 
VALUES('$cantidad_producto','$fecha_entrada','$fkcod_compra')";
  
$query = mysqli_query($conectar,$insert);

if($query){

    echo '<script>alert("Se almacenaron los datos correctamente");
    location.assign("consultar.php");
    </script>';

}else{
    echo '<script>alert("Error al conectarse a la BD");
    location.assign("agregar.html");
    </script>';
}

?>