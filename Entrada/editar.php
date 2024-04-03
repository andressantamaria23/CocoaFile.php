<?php
require "../conexion.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9T...">
    <link rel="stylesheet" href="StylosEntrada.css">
    <title>Actualizar Entrada</title>
</head>
<body>

<?php
if(isset($_POST['enviar'])){

    $cod_entrada = $_POST['cod_entrada'];
    $cantidad_producto = $_POST['cantidad_producto'];
    $fecha_entrada = $_POST['fecha_entrada'];
    $fkcod_compra = $_POST['fkcod_compra'];
    $sql = "UPDATE entrada SET cantidad_producto='" . $cantidad_producto . "', fecha_entrada='" . $fecha_entrada . "', fkcod_compra='" . $fkcod_compra . "' WHERE cod_entrada='" . $cod_entrada . "'";
    $resultado = mysqli_query($conectar, $sql);
    if($resultado){
        echo '<script>alert("Se actualizaron los datos correctamente");
        location.assign("consultar.php");
        </script>';
    }else{
        echo '<script>alert("Error al conectarse a la BD");
        location.assign("indexEntrada.html");
        </script>';
    }
    mysqli_close($conectar);
} else {

    $cod_entrada = $_GET['cod_entrada'];
    $sql = "SELECT * FROM entrada WHERE cod_entrada='".$cod_entrada."'";
    $resultado = mysqli_query($conectar, $sql);
    $fila = mysqli_fetch_assoc($resultado);
    $cantidad_producto = $fila['cantidad_producto'];
    $fecha_entrada = $fila['fecha_entrada'];
    $fkcod_compra = $fila['fkcod_compra'];
    mysqli_close($conectar);
}
?>

<nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="../Inventario/indexI.php">INVENTARIO</a>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Sesion
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../Perfil/perfilarturo.php">Perfil</a></li>
                <li><a class="dropdown-item" href="../cerrarsesion.php">Cerrar sesion</a></li>
            </ul>
        </div>
        <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">CHOCOLATE COLOMBIA</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            INVENTARIO
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="IndexEntrada.html" >ENTRADA</a></li>
                            <li><a class="dropdown-item" href="../Salida/indexSalida.html">SALIDA</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../campesinos/campesinos.html">CAMPESINOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../orden_compra/consultar.php">ORDEN COMPRA</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<div class="content" id="Form">
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post" id="Formulario"> 

  
  

        <h2 id="Titulo-Entrada">ACTUALIZAR ENTRADA</h2>

        <label for="cantidad_producto">Cantidad de Producto:</label>
        <input type="number" id="cantidad_producto" name="cantidad_producto" value="<?php echo $cantidad_producto; ?>" required>

        <label for="fecha_Entrada">Fecha de Entrada:</label>
        <input type="date" id="fecha_compra" name="fecha_entrada" value="<?php echo $fecha_entrada; ?>" required>

        <label for="cod_campesino">Código COMPRA:</label>
        <input type="text" value="<?php echo$fkcod_compra; ?>" name="fkcod_compra">
        <input type="hidden" value="<?php echo$cod_entrada; ?>" name="cod_entrada">
        <div class="content" id="botones">
            <table>
                <tr>
                    <td>
                        <div class="col-12">
                        <input type="submit" value="ACTUALIZAR" name="enviar">
                        </div>
                    </td>
                    <td>
                        <div class="col-12">
                            <a type="button" class="btn btn-primary" href="consultar.php">Consultar</a>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        
    </form>
    

</div>


<button onclick="goBack()"  class="btn btn-secondary btn-md" >Volver</button>
<script>
    function goBack() {
        window.history.back();
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPh..."></script>
</body>
</html>
