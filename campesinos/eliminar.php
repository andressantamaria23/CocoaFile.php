<?php

$cod_campesino=$_GET['cod_campesino'];
require "../conexion.php";

$sql="delete from campesinos WHERE cod_campesino='".$cod_campesino."'";
$resultado=mysqli_query($conectar,$sql);

if($resultado){
    echo '<script>alert("Se eliminaron los datos correctamente");
    location.assign("consultar.php");
    </script>';
}else{
echo '<script>alert("Error al eliminar los datos");
location.assign("consultar.php");
</script>';
}
mysqli_close($conectar);

?>