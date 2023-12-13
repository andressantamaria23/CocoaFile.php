<?php
$cod_entrada = $_GET['cod_entrada'];
require "../conexion.php";

$sql = "DELETE FROM entrada WHERE cod_entrada='" . $cod_entrada . "'";
$resultado = mysqli_query($conectar, $sql);

if ($resultado) {
    echo '<script>alert("Se eliminaron los datos correctamente"); location.assign("consultar.php");</script>';
} else {
    echo '<script>alert("Error al eliminar los datos"); location.assign("consultar.php");</script>';
}

mysqli_close($conectar);
?>
