<?php
require "../conexion.php";

$tipo_Cargo = $_POST['tipo_Cargo'];
$descripcion = $_POST['descripcion'];


$insert = "INSERT INTO cargo (tipo_Cargo,descripcion) VALUES('$tipo_Cargo','$descripcion')";

$query = mysqli_query($conectar,$insert);

if($query){

    echo '<script>alert("Se almacenaron los datos correctamente");
    location.assign("consultar.php");
    </script>';

}else{
    echo '<script>alert("Error al conectarse a la BD");
    location.assign("REGISTRARCARGO.html");
    </script>';
}

?>