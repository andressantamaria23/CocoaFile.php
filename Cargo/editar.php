<?php
require "../conexion.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cargo</title>
    <link rel="icon" href="../images/Captura.PNG" type="image/x-icon">
    <link rel="stylesheet" href="REGISTRARCARGO.CSS">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9T...">


</head>
<body>

<?php
if(isset($_POST['enviar'])){

    $cod_cargo = $_POST['cod_cargo'];
    $tipo_cargo = $_POST['tipo_Cargo'];
    $descripcion = $_POST['descripcion'];
    $sql = "UPDATE cargo SET tipo_Cargo='" . $tipo_cargo . "', descripcion='" . $descripcion . "' WHERE cod_cargo='" . $cod_cargo . "'";
    $resultado = mysqli_query($conectar, $sql);
    if($resultado){
        echo '<script>alert("Se actualizaron los datos correctamente");
        location.assign("consultar.php");
        </script>';
    }else{
        echo '<script>alert("Error al conectarse a la BD");
        location.assign("REGISTRARCARGO.html");
        </script>';
    }
    mysqli_close($conectar);
} else {

    $cod_cargo = $_GET['cod_cargo'];
    $sql = "SELECT * FROM cargo WHERE cod_cargo ='".$cod_cargo."'";
    $resultado = mysqli_query($conectar, $sql);
    $fila = mysqli_fetch_assoc($resultado);
    $tipo_cargo = $fila['tipo_Cargo'];
    $descripcion = $fila['descripcion'];
    mysqli_close($conectar);
}
?>

    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand" href="">ADMINISTRADOR</a>
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
           
                <li class="nav-item">
                  <a class="nav-link" href="../Empleados/REGISTRAREMPLEADOS.HTML">REGISTRAR EMPLEADOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="REGISTRARCARGO.HTML">REGISTRAR CARGO</a>
                </li>
            </div>
          </div>
        </div>
      </nav>


      <form action="editar.php" method="post">

      

        <h2>Editar de Cargo</h2>
        
        <label for="tipoCargo">Tipo de Cargo:</label>
        <select class="form-select" id="" name="tipo_Cargo" required>
                 <option selected disabled value=""></option>
                 <option value="Administrador" <?php if ($tipo_cargo === "Administrador") echo 'selected'; ?>>Administrador</option>
                 <option value="Asistente Administrativo" <?php if ($tipo_cargo === "Asistente Administrativo") echo 'selected'; ?>>Asistente Administrativo</option>
                 <option value="Jefe inventario" <?php if ($tipo_cargo === "Jefe inventario") echo 'selected'; ?>>Jefe inventario</option>
                 <option value="Bodeguero" <?php if ($tipo_cargo === "Bodeguero") echo 'selected'; ?>>Bodeguero</option>
             </select>

        <label for="descripcion">Descripción:</label>
        <input id="descripcion" name="descripcion" rows="4" value="<?php echo $descripcion; ?>" required>
        <input type="hidden" name="cod_cargo" value="<?php echo $cod_cargo; ?>" required>
            <br>
            <br>
            <input type="submit" value="ACTUALIZAR" class="btn btn-primary" name="enviar">
            <br>
            <br>
        <a href="consultar.php" class="btn btn-primary" >CONSULTAR</a>
    </form>

    
    <button onclick="goBack()"  class="btn btn-secondary btn-md" >Volver</button>
<script>
    function goBack() {
        window.history.back();
    }
</script>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPh..."></script>

</body>
</html>