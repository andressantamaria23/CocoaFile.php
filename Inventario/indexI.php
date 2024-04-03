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
  $sql = "SELECT * FROM Inventario
          INNER JOIN campesinos ON campesinos.cod_campesino = inventario.fkcod_campesino
          INNER JOIN entrada ON entrada.cod_entrada = inventario.fkcod_entrada
          INNER JOIN salida ON salida.cod_salida = inventario.fkcod_salida";
  
  $resultado = mysqli_query($conectar, $sql);
  ?>
  

    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
    <span class="navbar-toggler-icon"></span>
</button>
          
          
          <a class="navbar-brand" href="indexI.php">INVENTARIO</a>
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
                      <li><a class="dropdown-item" href="../Entrada/IndexEntrada.html">ENTRADA</a></li>
                      <li><a class="dropdown-item" href="../Salida/indexSalida.html">SALIDA</a></li>
                    </ul>
                  </li>
                <li class="nav-item">
                  <a class="nav-link" href="../campesinos/campesinos.html">CAMPESINOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../orden_compra/consultar.php">ORDEN COMPRA</a>
                  </li>
                </li>
              </ul>
            </div>
          </div>
        </div>
       </nav>
        <div class="container mt-4" id="container">

        <div class="d-flex justify-content-end mb-2" id="botones">
        
            <a type="button" class="btn btn-primary" href="agregar.html">Agregar</a>
          
        </div>
                     
                     <table class="table" id="myTable">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Producto</th>
                      <th>Cantidad</th>
                      <th>Fecha de Vencimiento</th>
                      <th>Fecha de Entrada</th>
                      <th>Campesino</th>
                      <th>Fecha de Salida</th>
                      <th class="hidden">Editar</th>
                      <th>Eliminar</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                  while ($fila = mysqli_fetch_assoc($resultado)) {
                      echo "<tr>";
                      echo "<td>" . $fila['cod_inventario'] . "</td>";
                      echo "<td>" . $fila['producto'] . "</td>";
                      echo "<td>" . $fila['cantidad'] . "</td>";
                      echo "<td>" . $fila['fecha_vencimiento'] . "</td>";
                      echo "<td>" . $fila['fecha_entrada'] . "</td>";
                      echo "<td>" . $fila['nombre_proveedor'] . "</td>";
                      echo "<td>" . $fila['fecha_Salida'] . "</td>";
                      echo "<td><a class='btn btn-secondary' href='editar.php?cod_inventario=" . $fila['cod_inventario'] . "'>Editar</a></td>";
                      echo "<td><a class='btn btn-danger' href='eliminar.php?cod_inventario=" . $fila['cod_inventario'] . "' onclick='return confirmar()'>Eliminar</a></td>";
                      echo "</tr>";
                  }
                  ?>
              </tbody>
          </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        var table = $('#myTable').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            select: true // Habilita la extensión Select
        });

        // Agrega listas desplegables al encabezado de la tabla
        $('#myTable thead tr').clone(true).appendTo('#myTable thead');
        $('#myTable thead tr:eq(1) th').each(function(i) {
            var title = $(this).text(); // Es el nombre de la columna
            $(this).html('<input type="text" placeholder="Search...' + title + '" />');

            // Agrega las listas desplegables solo a las columnas deseadas
            if (i === 1 || i === 5) {
                var select = $('<select><option value=""></option></select>')
                    .appendTo($(this).empty())
                    .on('change', function() {
                        table.column(i).search($(this).val()).draw();
                    });

                // Obtiene los valores únicos de la columna y los agrega a la lista desplegable
                table.column(i).data().unique().sort().each(function(d) {
                    select.append('<option value="' + d + '">' + d + '</option>');
                });
            }
        });

        // Agrega la funcionalidad de búsqueda a las entradas de texto
        $('#myTable thead input').on('keyup change', function() {
            table
                .column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
        });
    });
</script>

</body>

</html>