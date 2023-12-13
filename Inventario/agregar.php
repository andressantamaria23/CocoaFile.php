<?php
require "../conexion.php";

$producto = $_POST['producto'];
$cantidad = $_POST['cantidad'];
$fecha_vencimiento = $_POST['fecha_vencimiento'];
$fkcod_campesino = $_POST['fkcod_campesino'];
$fkcod_entrada = $_POST['fkcod_entrada'];
$fkcod_salida = $_POST['fkcod_salida'];

$insert = "INSERT INTO inventario(producto,cantidad,fecha_vencimiento,fkcod_campesino,fkcod_entrada,fkcod_salida) 
VALUES('$producto','$cantidad','$fecha_vencimiento','$fkcod_campesino','$fkcod_entrada','$fkcod_salida')";
  
$query = mysqli_query($conectar,$insert);

if($query){

    echo '<script>alert("Se almacenaron los datos correctamente");
        location.assign("indexI.php");
    </script>';

    }else{
    echo '<script>alert("Error al conectarse a la BD");
    
    location.assign("agregar.html");
    </script>';
}

?>