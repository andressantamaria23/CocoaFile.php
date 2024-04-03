<?php
$cod_cargo= $_GET['cod_cargo'];
require "../conexion.php";

$sql = "DELETE FROM cargo WHERE cod_cargo='" . $cod_cargo . "'";
$resultado = mysqli_query($conectar, $sql);

if ($resultado) {
    echo '<script>alert("Se eliminaron los datos correctamente"); location.assign("consultar.php");</script>';
} else {
    echo '<script>alert("Error al eliminar los datos"); location.assign("consultar.php");</script>';
}

mysqli_close($conectar);
?>
