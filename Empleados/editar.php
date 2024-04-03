<?php
require "../conexion.php";

if (isset($_POST['enviar'])) {
    $IdEmpleado = $_POST['IdEmpleado'];
    $NomEmpleado = $_POST['NomEmpleado'];
    $ApellEmpleado = $_POST['ApellEmpleado'];
    $Localidad = $_POST['Localidad'];
    $barrio = $_POST['barrio'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];
    $fkcod_cargo = $_POST['fkcod_cargo'];
    $fkcod_contrato = $_POST['fkcod_contrato'];

    $sql = "UPDATE empleado SET IdEmpleado='".$IdEmpleado."', NomEmpleado='" . $NomEmpleado . "', ApellEmpleado='" . $ApellEmpleado .
        "', Localidad='" . $Localidad . "', barrio='" . $barrio . "', fecha_nacimiento='" . $fecha_nacimiento .
        "', direccion='" . $direccion . "', email='" . $email . "', contraseña='" . $contraseña .
        "', fkcod_cargo='" . $fkcod_cargo . "', fkcod_contrato='" . $fkcod_contrato .
         "' WHERE IdEmpleado='" . $IdEmpleado . "'";
    $resultado = mysqli_query($conectar, $sql);

    if ($resultado) {
        echo '<script>alert("Se actualizaron los datos correctamente");
        location.assign("consultar.php");
        </script>';
    } else {
        echo '<script>alert("Error al actualizar los datos");
        location.assign("editar.php");
        </script>';
    }

    mysqli_close($conectar);
} else {
    $IdEmpleado = $_GET['IdEmpleado'];
    $sql = "SELECT * FROM empleado WHERE IdEmpleado='" . $IdEmpleado . "'";
    $resultado = mysqli_query($conectar, $sql);

    if ($resultado) {
        $fila = mysqli_fetch_assoc($resultado);
        $NomEmpleado = $fila['NomEmpleado'];
        $ApellEmpleado = $fila['ApellEmpleado'];
        $Localidad = $fila['Localidad'];
        $barrio = $fila['barrio'];
        $fecha_nacimiento = $fila['fecha_nacimiento'];
        $direccion = $fila['direccion'];
        $email = $fila['email'];
        $contraseña = $fila['contraseña'];
        $fkcod_cargo = $fila['fkcod_cargo'];
        $fkcod_contrato = $fila['fkcod_contrato'];
    } else {
        echo '<script>alert("Error al obtener los datos");</script>';
    }

    mysqli_close($conectar);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de empleados</title>
    <link rel="icon" href="../images/Captura.PNG" type="image/x-icon">
    <link rel="stylesheet" href="REGISTRAREMPLEADO.CSS">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9T...">

</head>
<body>

<nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar"
                aria-controls="offcanvasDarkNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="">ADMINISTRADOR</a>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                Sesion
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../Perfil/perfilarturo.php">Perfil</a></li>
                <li><a class="dropdown-item" href="../login.html">Cerrar sesion</a></li>
            </ul>
        </div>
        <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
             aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">CHOCOLATE COLOMBIA</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">

                <li class="nav-item">
                    <a class="nav-link" href="../Empleados/REGISTRAREMPLEADOS.HTML">REGISTRAR EMPLEADOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Cargo/REGISTRARCARGO.HTML">REGISTRAR CARGO</a>
                </li>
            </div>
        </div>
    </div>
</nav>
<br>
<br>
<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
    <h2>Formulario de Empleado</h2>
    <input type="hidden" id="" name="IdEmpleado" value="<?php echo $IdEmpleado; ?>" >
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="NomEmpleado" value="<?php echo $NomEmpleado; ?>" required>

    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="ApellEmpleado" value="<?php echo $ApellEmpleado; ?>" required>

    <label for="fechaNacimiento">Fecha de Nacimiento:</label>
    <input type="date" id="fechaNacimiento" name="fecha_nacimiento" value="<?php echo $fecha_nacimiento; ?>" required>

    <label for="direccion">Dirección:</label>
    <input type="text" id="direccion" name="direccion" value="<?php echo $direccion; ?>" required>

    <label for="localidad">Localidad:</label>
    <input type="text" id="localidad" name="Localidad" value="<?php echo $Localidad; ?>" required>

    <label for="barrio">Barrio:</label>
    <input type="text" id="barrio" name="barrio" value="<?php echo $barrio; ?>" required>

    <label for="codigoCargo">Código de Cargo:</label>
    <select class="form-select" id="codigoCargo" name="fkcod_cargo" required>
        <option selected disabled value="" aria-required="true"></option>
        <option <?php echo ($fkcod_cargo === '1001') ? 'selected' : ''; ?>>1001</option>
        <option <?php echo ($fkcod_cargo === '1002') ? 'selected' : ''; ?>>1002</option>
        <option <?php echo ($fkcod_cargo === '1003') ? 'selected' : ''; ?>>1003</option>

    </select>

    <label for="codigoContrato">Código de Contrato:</label>
    <select class="form-select" id="" name="fkcod_contrato" required>
        <option selected disabled value="" aria-required="true"></option>
        <option <?php echo ($fkcod_contrato === '3001') ? 'selected' : ''; ?>>3001</option>
        <option <?php echo ($fkcod_contrato === '3002') ? 'selected' : ''; ?>>3002</option>
        <option <?php echo ($fkcod_contrato === '3003') ? 'selected' : ''; ?>>3003</option>
        <option <?php echo ($fkcod_contrato === '3004') ? 'selected' : ''; ?>>3004</option>
        <option <?php echo ($fkcod_contrato === '3005') ? 'selected' : ''; ?>>3005</option>
    </select>

    <label for="nombre">email:</label>
    <input type="text" id="nombre" name="email" value="<?php echo $email; ?>" required>

    <label for="nombre">contraseña:</label>
    <input type="text" id="nombre" name="contraseña" value="<?php echo $contraseña; ?>" required>

    <br>
    <br>
    <input type="submit" class="btn btn-primary" name="enviar" value="ACTUALIZAR" >
    <a type="button" class="btn btn-primary" href="consultar.php">consultar</a>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPh..."></script>

</body>
</html>

