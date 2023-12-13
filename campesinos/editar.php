<?php
require "../conexion.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="stylos.css">
    <title>Campesinos</title>
</head>
<body>

<?php
if(isset($_POST['enviar'])){

    $cod_campesino = $_POST['cod_campesino'];
    $codigo_postal = $_POST['codigo_postal'];
    $nombre_proveedor = $_POST['nombre_proveedor'];
    $telefono_proveedor = $_POST['telefono_proveedor'];
    $fkcod_contrato_comercial = $_POST['fkcod_contrato_comercial'];
    $sql = "UPDATE campesinos SET condigo_postal='" . $codigo_postal . "', nombre_proveedor='" . $nombre_proveedor . "', nombre_telefono='" . $nombre_telefono .  "', fkcod_contrato_comercial='" . $fkcod_contrato_comercial . "' WHERE cod_campesino='" . $cod_campesino . "'";
    $resultado = mysqli_query($conectar, $sql);
    if($resultado){
        echo '<script>alert("Se actualizaron los datos correctamente");
        location.assign("consultar.php");
        </script>';
    }else{
        echo '<script>alert("Error al conectarse a la BD");
        location.assign("campesinos.html");
        </script>';
    }
    mysqli_close($conectar);
} else {

    $cod_campesino = $_GET['cod_campesino'];
    $sql = "SELECT * FROM campesinos WHERE cod_campesino='".$cod_campesino."'";
    $resultado = mysqli_query($conectar, $sql);
    $fila = mysqli_fetch_assoc($resultado);
    $codigo_postal = $fila['codigo_postal'];
    $nombre_proveedor = $fila['nombre_proveedor'];
    $telefono_proveedor = $fila['telefono_proveedor'];
    $fkcod_contrato_comercial = $fila['fkcod_contrato_comercial'];
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
             <li><a class="dropdown-item" href="../Perfil/perfilarturo.html">Perfil</a></li>
              <li><a class="dropdown-item" href="../login.html">Cerrar sesion</a></li>
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
                      <li><a class="dropdown-item" href="../Salida/indexSalida.html">SALIDA</a></li>
                    </ul>
                  </li>
                <li class="nav-item">
                  <a class="nav-link" href="campesinos.html">CAMPESINOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">ORDEN COMPRA</a>
                  </li>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>

        <div class="container-fluid">
            <form action="agregar.php" method="post"> 
                <h2>CAMPESINOS</h2>
               <label for="#">Codigo postal: </label>
                <input type="text" id="cod_salida" name="codigo_postal" value="<?php echo $codigo_postal; ?>" required>
                <label for="">Nombre Proveedor:</label>
                <input type="text" id="" name="nombre_proveedor" value="<?php echo $nombre_proveedor; ?>" required>
                <label for="">Telefono proveedor</label>
                <input type="text" id="" name="telefono_proveedor" value="<?php echo $telefono_proveedor; ?>" required>
                <label for="">Contrato comercial</label>
                <select class="form-select" id="fkcod_contrato_comercial" name="fkcod_contrato_comercial" required>
                                <option selected disabled value=""></option>
                                <option value="3006" <?php if ($fkcod_contrato_comercial === "3006") echo 'selected'; ?>>3006</option>
                                <option value="3007" <?php if ($fkcod_contrato_comercial === "3007") echo 'selected'; ?>>3007</option>
                                <option value="3008" <?php if ($fkcod_contrato_comercial === "3008") echo 'selected'; ?>>3008</option>
                                <option value="3009" <?php if ($fkcod_contrato_comercial === "3009") echo 'selected'; ?>>3009</option>
                                <option value="3010" <?php if ($fkcod_contrato_comercial === "3010") echo 'selected'; ?>>3010</option>
                            </select>
                <input type="submit" name="enviar" value="ACTUALIZAR" >
                <a type="button" class="btn btn-primary" href="consultar.php">consultar</a>
            </form>
          </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>