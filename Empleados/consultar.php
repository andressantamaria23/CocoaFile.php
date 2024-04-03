<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="stylos.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <title>Inventario</title>

    <script type="text/javascript">
  function confirmar() {
    return confirm('¿Estás seguro de eliminar los datos?');
  }
</script>


</head>
<body>
  <?php
  include("../Conexion.php");
  $sql = "SELECT * FROM empleado
          INNER JOIN cargo ON cargo.cod_cargo = empleado.fkcod_cargo
          INNER JOIN contrato_laboral ON contrato_laboral.fkcod_contrato = empleado.fkcod_contrato";
  
  $resultado = mysqli_query($conectar, $sql);
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
                <a class="nav-link" href="../Cargo/REGISTRARCARGO.html">REGISTRAR CARGO</a>
            </li>
        </div>
      </div>
    </div>
  </nav>
        <div class="container mt-4" id="container">

        <div class="d-flex justify-content-end mb-2" id="botones" >
        <button type="hidden" class="btn btn-outline-secondary"  onclick="editarFila()">Editar</button>
        </div>
                    <br> 
                     <table class="table" id="myTable">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Fecha de nacimiento</th>
                      <th>Localidad</th>
                      <th>Barrio</th>
                      <th>Direccion</th>
                      <th>Cargo</th>
                      <th>Codigo contrato</th>
                      <th>email</th>
                      <th>Contraseña</th>
                      <th class="hidden">Editar</th>
                      <th>Eliminar</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                  while ($fila = mysqli_fetch_assoc($resultado)) {
                      echo "<tr>";
                      echo "<td>" . $fila['IdEmpleado'] . "</td>";
                      echo "<td>" . $fila['NomEmpleado'] . "</td>";
                      echo "<td>" . $fila['ApellEmpleado'] . "</td>";
                      echo "<td>" . $fila['fecha_nacimiento'] . "</td>";
                      echo "<td>" . $fila['Localidad'] . "</td>";
                      echo "<td>" . $fila['barrio'] . "</td>";
                      echo "<td>" . $fila['direccion'] . "</td>";
                      echo "<td>" . $fila['tipo_Cargo'] . "</td>";
                      echo "<td>" . $fila['fkcod_contrato'] . "</td>";
                      echo "<td>" . $fila['email'] . "</td>";
                      echo "<td>" . $fila['contraseña'] . "</td>";
                      echo "<td><a class='btn btn-secondary' href='editar.php?IdEmpleado=" . $fila['IdEmpleado'] . "'>Editar</a></td>";
                      echo "<td><a class='btn btn-danger' href='eliminar.php?IdEmpleado=" . $fila['IdEmpleado'] . "' onclick='return confirmar()'>Eliminar</a></td>";
                      echo "</tr>";
                  }
                  ?>
              </tbody>
          </table>

          <button onclick="goBack()"  class="btn btn-secondary btn-md" >Volver</button>

<script>
    function goBack() {
        window.history.back();
    }
</script>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });

</script>

</body>

</html>