<?php
require "../conexion.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9T...">
    <link rel="stylesheet" href="StylosSalida.css">
    <title>SALIDA</title>
</head>
<body>

<?php
if(isset($_POST['enviar'])){

    $cod_salida = $_POST['cod_salida'];
    $cantidad_producto = $_POST['cantidad_producto'];
    $fecha_salida = $_POST['fecha_Salida'];
    $sql = "UPDATE salida SET cantidad_producto='" . $cantidad_producto . "', fecha_Salida='" . $fecha_salida . "' WHERE cod_salida='" . $cod_salida . "'";
    $resultado = mysqli_query($conectar, $sql);
    if($resultado){
        echo '<script>alert("Se actualizaron los datos correctamente");
        location.assign("consultar.php");
        </script>';
    }else{
        echo '<script>alert("Error al conectarse a la BD");
        location.assign("editar.php");
        </script>';
    }
    mysqli_close($conectar);
} else {

    $cod_salida = $_GET['cod_salida'];
    $sql = "SELECT * FROM salida WHERE cod_salida='".$cod_salida."'";
    $resultado = mysqli_query($conectar, $sql);
    $fila = mysqli_fetch_assoc($resultado);
    $cantidad_producto = $fila['cantidad_producto'];
    $fecha_salida = $fila['fecha_Salida'];
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
                      <li><a class="dropdown-item" href="../Entrada/IndexEntrada.html">ENTRADA</a></li>
                      <li><a class="dropdown-item" href="indexSalida.html">SALIDA</a></li>
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
      <div class="content">
      <form action="<?=$_SERVER['PHP_SELF']?>" method="post"> 
          <h2>SALIDA DE PRODUCTOS</h2>

         <input type="hidden" name="cod_salida" value="<?php echo $cod_salida; ?>" >
         

          <label for="cantidad_producto">Cantidad de Producto:</label>
          <input type="number" id="cantidad_producto" name="cantidad_producto" value="<?php echo $cantidad_producto; ?>" required>

          <label for="fecha_compra">Fecha de Salida:</label>
          <input type="date" id="" name="fecha_Salida" value="<?php echo $fecha_salida; ?>" required>

          <input type="submit" name="enviar" value="ACTUALIZAR">
          <a type="button" class="btn btn-primary" href="consultar.php">consultar</a>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPh..."></script>
</body>
</html>
