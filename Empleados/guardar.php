<?php
require "../conexion.php";

$NomEmpleado = $_POST['NomEmpleado'];
$ApellEmpleado = $_POST['ApellEmpleado'];
$Localidad = $_POST['Localidad'];
$barrio = $_POST['barrio'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$direccion = $_POST['direccion'];
$email = $_POST['email'];
$contraseña = $_POST['contraseña'];
$fkcod_cargo = $_POST['fkcod_cargo'];
$fkcod_contrato = $_POST['fkcod_contrato'];

$insert = "INSERT INTO empleado(NomEmpleado,ApellEmpleado,Localidad,barrio,fecha_nacimiento,direccion,email,contraseña,fkcod_cargo,fkcod_contrato) 
VALUES('$NomEmpleado','$ApellEmpleado','$Localidad','$barrio','$fecha_nacimiento','$direccion','$email','$contraseña','$fkcod_cargo','$fkcod_contrato')";
  
$query = mysqli_query($conectar,$insert);

if($query){

    echo '<script>alert("Se almacenaron los datos correctamente");
        location.assign("consultar.php");
    </script>';

    }else{
    echo '<script>alert("Error al conectarse a la BD");
    
    location.assign("REGISTRAREMPLEADOS.HTML");
    </script>';
}

?>