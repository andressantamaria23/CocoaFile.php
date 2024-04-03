<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9T...">
    <link rel="stylesheet" href="ADMINISTRADOR.CSS">
    <title>Administrador</title>
    <link rel="icon" href="../images/Captura.PNG" type="image/x-icon">
</head>
<body>
  <?php




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
                    <a class="nav-link" href="../Cargo/REGISTRARCARGO.HTML">REGISTRAR CARGO</a>
                </li>
            </div>
          </div>
        </div>
      </nav>
      
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPh..."></script>
</body>
</html>