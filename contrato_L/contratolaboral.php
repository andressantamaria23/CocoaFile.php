<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cocoafile";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT * FROM capacitaciones";
$result = $conn->query($sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contrato Laboral</title>
    <link rel="icon" href="../images/Captura.PNG" type="image/x-icon">
    <link rel="stylesheet" href="contratolaboral.css">
    <script src="contratolaboral.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand" href="../Documentacion/documentacion.html">DOCUMENTACIÓN</a>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-border-width" viewBox="0 0 16 16">
            <path d="M0 3.5A.5.5 0 0 1 .5 3h15a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5zm0 5A.5.5 0 0 1 .5 8h15a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h15a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5"/>
          </svg>
          <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">CHOCOLATE COLOMBIA</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     CONTRATOS
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                      <li><a class="dropdown-item" href="../contrato_L/contratolaboral.html">CONTRATO LABORAL</a></li>
                      <li><a class="dropdown-item" href="../contrato_c/contratocomercial.html">CONTRATO COMERCIAL</a></li>
                    </ul>
                  </li>
                <li class="nav-item">
                  <a class="nav-link" href="../capacitaciones/capacitaciones.html">CAPACITACIONES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../orden_compra/ordenesdecompra.html">ORDEN COMPRA</a>
                  </li>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>

      <br>
      <br>
      <br>
      <button type="button" class="btn btn-outline-success" id="crearContrato">CREAR CONTRATO</button>
      <script>
          document.getElementById("crearContrato").addEventListener("click", function() {
              window.location.href = "nuevocontratolaboral.html";
          });
      </script>
<hr>
    <table class="table text-center justify-content-center align-items-center" id="myTable">
    <thead>
    <tr>
    <th>CÓDIGO DE CONTRATO</th>
    <td>SALARIO</td>
    <td>FUNCIONES</td> 
    </tr>
    </thead>
<tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<th>" . $row["fkcod_contrato"] . "</th>";
                    echo "<td>" . $row["salario"] . "</td>";
                    echo "<td>" . $row["funciones"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No hay capacitaciones disponibles.</td></tr>";
            }
            ?>
        </tbody>
    </table>


</body>
</html>