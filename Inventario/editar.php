<?php

require "../conexion.php";

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9T...">
    <link rel="stylesheet" href="StylosA.css">
    <title>Actualizar Inventario</title>
</head>
<body>

    <?php
        if(isset($_POST['enviar'])){
            $cod_inventario = $_POST['cod_inventario'];
            $producto = $_POST['producto'];
            $cantidad = $_POST['cantidad'];
            $fecha_vencimiento = $_POST['fecha_vencimiento'];
            $fkcod_campesino = $_POST['fkcod_campesino'];
            $fkcod_entrada = $_POST['fkcod_entrada'];
            $fkcod_salida = $_POST['fkcod_salida'];

            $sql = "UPDATE inventario SET producto='" . $producto . "', cantidad='" . $cantidad .
             "', fecha_vencimiento='" . $fecha_vencimiento . "'
            , fkcod_campesino='" . $fkcod_campesino . "', fkcod_entrada='" . $fkcod_entrada . 
            "', fkcod_salida='" . $fkcod_salida . "' WHERE cod_inventario='" . $cod_inventario . "'";



            $resultado=mysqli_query($conectar,$sql);

            if($resultado){
                echo '<script>alert("Se actualizaron los datos correctamente");
                location.assign("IndexI.php");
                </script>';
            }else{
            echo '<script>alert("Error al conectarse a la BD");
            location.assign("agregar.html");
            </script>';
            }
            mysqli_close($conectar);
        
         }else{

            $cod_inventario = $_GET['cod_inventario'];

            $sql = "SELECT * FROM inventario WHERE cod_inventario='".$cod_inventario."'";
            $resultado= mysqli_query($conectar,$sql);

            $fila = mysqli_fetch_assoc($resultado);
            $producto = $fila['producto'];
            $cantidad = $fila['cantidad'];
            $fecha_vencimiento = $fila['fecha_vencimiento'];
            $fkcod_campesino = $fila['fkcod_campesino'];
            $fkcod_entrada = $fila['fkcod_entrada'];
            $fkcod_salida = $fila['fkcod_salida'];
            $cod_inventario = $fila['cod_inventario'];
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
                      <li><a class="dropdown-item" href="../Entrada/IndexEntrada.html" >ENTRADA</a></li>
                      <li><a class="dropdown-item" href="../Salida/indexSalida.html">SALIDA</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../campesinos/campesinos.html">CAMPESINOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../login.html">ORDEN COMPRA</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <div class="container-sm" id="Form">
      <form action="<?=$_SERVER['PHP_SELF']?>" method="post" id="Formulario"> 
          
          <label for="parentesco" class="form-label">Producto</label>
            <select class="form-select" id="" name="" >
                <option selected disabled value="" ></option>
                <option>cacao</option>
            </select>
            <label for="parentesco" class="form-label">Producto</label>
            <select class="form-select" id="" name="" >
                <option selected disabled value="" ></option>
                <option>cacao</option>
            </select>
            <label for="parentesco" class="form-label">Producto</label>
              <select class="form-select" id="" name="" >
                  <option selected disabled value="" ></option>
                  <option>cacao</option>
              </select>
              <br>
              <br>
              <h2 id="Titulo-Entrada">ACTUALIZAR INVENTARIO</h2>
              
                <label for="parentesco" class="form-label">Producto</label>
                <select class="form-select" id="" name="producto" required>
                    <option selected disabled value="" aria-required="true"></option>
                    <option value="cacao" <?php if ($producto === "cacao") echo 'selected'; ?>>cacao</option>
                </select>
            

          <label for="cantidad_producto">Cantidad de Producto:</label>
          <input type="number" id="cantidad" name="cantidad" value="<?php echo $cantidad; ?>" required>

          <label for="fecha_Entrada">Fecha de vencimiento:</label>
          <input type="date" id="fecha_vencimiento" name="fecha_vencimiento" value="<?php echo $fecha_vencimiento; ?>" required>
          <label for="cod_campesino">Código campesino:</label>
                <select class="form-select" id="cod_campesino" name="fkcod_campesino" required>
                  <option selected disabled value="" aria-required="true"></option>
                  <option value="800012" <?php if ($fkcod_campesino === "800012") echo 'selected'; ?>>800012</option>
                  <option value="800013" <?php if ($fkcod_campesino === "800013") echo 'selected'; ?>>800013</option>
                  <option value="800014" <?php if ($fkcod_campesino === "800014") echo 'selected'; ?>>800014</option>
                  <option value="800015" <?php if ($fkcod_campesino === "800015") echo 'selected'; ?>>800015</option>
                  <option value="800016" <?php if ($fkcod_campesino === "800016") echo 'selected'; ?>>800016</option>
                </select>

                <label for="cod_entrada">Código Entrada:</label>
                <select class="form-select" id="cod_entrada" name="fkcod_entrada" required>
                  <option selected disabled value="" aria-required="true"></option>
                  <option value="889001" <?php if ($fkcod_entrada === "889001") echo 'selected'; ?>>889001</option>
                  <option value="889002" <?php if ($fkcod_entrada === "889002") echo 'selected'; ?>>889002</option>
                  <option value="889003" <?php if ($fkcod_entrada === "889003") echo 'selected'; ?>>889003</option>
                  <option value="889004" <?php if ($fkcod_entrada === "889004") echo 'selected'; ?>>889004</option>
                  <option value="889005" <?php if ($fkcod_entrada === "889005") echo 'selected'; ?>>889005</option>

                </select>

                <label for="cod_salida">Código salida:</label>
                <select class="form-select" id="cod_salida" name="fkcod_salida" required>
                  <option selected disabled value="" aria-required="true"></option>
                  <option value="9001" <?php if ($fkcod_salida === "9001") echo 'selected'; ?>>9001</option>
                  <option value="9002" <?php if ($fkcod_salida === "9002") echo 'selected'; ?>>9002</option>
                  <option value="9003" <?php if ($fkcod_salida === "9003") echo 'selected'; ?>>9003</option>
                  <option value="9004" <?php if ($fkcod_salida === "9004") echo 'selected'; ?>>9004</option>
                  <option value="9005" <?php if ($fkcod_salida === "9005") echo 'selected'; ?>>9005</option>

                </select>




            <input type="hidden" value="<?php echo$cod_inventario; ?>" name="cod_inventario">

            <div class="content" id="botones">
            <table>
              <tr>
                <td>
                  <div class="col-12">
                    <input type="submit" value="ACTUALIZAR" name="enviar">
                  </div>
                  <button onclick="goBack()"  class="btn btn-secondary btn-md" >Volver</button>

                </td>
                <td>
                </td>
              </tr>
            </table>
          </div>
     
      </form>
    </div>

<script>
    function goBack() {
        window.history.back();
    }
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPh..."></script>
</body>
</html>
