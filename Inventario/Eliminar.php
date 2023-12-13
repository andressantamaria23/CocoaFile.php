<?php

$cod_inventario=$_GET['cod_inventario'];
require "../conexion.php";

$sql="delete from inventario WHERE cod_inventario='".$cod_inventario."'";
$resultado=mysqli_query($conectar,$sql);

if($resultado){
    echo '<script>alert("Se eliminaron los datos correctamente");
    location.assign("indexI.php");
    </script>';
}else{
echo '<script>alert("Error al eliminar los datos");
location.assign("indexI.php");
</script>';
}
mysqli_close($conectar);

?>