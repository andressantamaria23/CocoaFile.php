<?php
$cod_salida= $_GET['cod_salida'];
require "../conexion.php";

$sql = "DELETE FROM salida WHERE cod_salida='" . $cod_salida . "'";
$resultado = mysqli_query($conectar, $sql);

if ($resultado) {
    echo '<script>alert("Se eliminaron los datos correctamente"); location.assign("consultar.php");</script>';
} else {
    echo '<script>alert("Error al eliminar los datos"); location.assign("consultar.php");</script>';
}

mysqli_close($conectar);
?>
