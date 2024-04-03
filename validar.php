<?php
session_start();
require "Conexion.php";

$email = $_POST['email'];
$contraseña = $_POST['contraseña'];


$_SESSION['email'] = $email;


if ($conectar) {
    
    $consulta = "SELECT * FROM empleado 
    INNER JOIN cargo ON cargo.cod_cargo = empleado.fkcod_cargo
    WHERE email = ? AND contraseña = ?";
    $statement = mysqli_prepare($conectar, $consulta);

    
    if ($statement) {
        
        mysqli_stmt_bind_param($statement, "ss", $email, $contraseña);
        mysqli_stmt_execute($statement);

        
        $resultado = mysqli_stmt_get_result($statement);
        $permiso = $datos['fkcod_cargo'];
        

        $_SESSION['id_user'] = $datos['IdEmpleado'];

        $filas = mysqli_fetch_array($resultado);


        if ($filas && $filas['fkcod_cargo'] == 1001) {
            header("location:Admin/ADMINISTRADOR.php");
        } elseif ($filas && $filas['fkcod_cargo'] == 1002) {
            header("location:Documentacion/documentacion.php");
        } elseif ($filas && $filas['fkcod_cargo'] == 1003) {
            header("location:inventario/IndexI.php");
        } else {
            echo '<script>alert("DATOS INCORRECTOS") </script>;';
            header("location:login.html");
        }

    
        mysqli_stmt_close($statement);
    } else {
        
        echo json_encode(['success' => false, 'error' => 'Error en la preparación de la consulta.']);
    }

    
    mysqli_close($conectar);
} else {
    
    echo json_encode(['success' => false, 'error' => 'Error al conectar con la base de datos.']);
}
?>
