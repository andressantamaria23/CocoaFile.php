<?php
session_start();


if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    include("../Conexion.php");

    $sql = "SELECT * FROM empleado
            INNER JOIN cargo ON cargo.cod_cargo = empleado.fkcod_cargo
            INNER JOIN contrato_laboral ON contrato_laboral.fkcod_contrato = empleado.fkcod_contrato
            WHERE empleado.email = '$email'";  

    $resultado = mysqli_query($conectar, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Arturo</title>
    <link rel="icon" href="images/Captura.PNG" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="perfilarturo.css">
    <script src="perfilarturo.js"></script>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <img src="../images/Captura.PNG" alt="Logo de la empresa">
        </div>
        <div class="profile">
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../Perfil/perfilarturo.php">Perfil</a></li>
             <li><a class="dropdown-item" href="../cerrarsesion.php">Cerrar sesion</a></li>
             </ul>
            <img src="../images/Arturo.jpg" alt="Foto de perfil del usuario">
        </div>
    </div>

    <div class="perfil-container">
        <div class="perfil-info" id="perfilInfo">
            <img src="../images/Arturo.jpg" alt="Foto de perfil de Arturo">
            <div class="datos-personales">
                <?php while ($fila = mysqli_fetch_assoc($resultado)): ?>
                    <h2><?php echo $fila['NomEmpleado']; ?> <?php echo $fila['ApellEmpleado']; ?></h2>
                    <p>Nombre: <?php echo $fila['NomEmpleado']; ?></p>
                    <p>Apellido: <?php echo $fila['ApellEmpleado']; ?></p>
                    <p>Fecha Nacimiento <?php echo $fila['fecha_nacimiento']; ?></p>
                    <p>Correo:<?php echo $fila['email']; ?> </p>
                    <p>direccion: <?php echo $fila['direccion']; ?></p>
                    <p>Cargo: <?php echo $fila['tipo_Cargo']; ?></p>
                    <p>contraseña: <?php echo $fila['contraseña']; ?></p>
                <?php endwhile; ?>
            </div>
        </div>
        <button class="editar-btn" onclick="editarPerfil()">Editar</button>

        <div class="perfil-editar" id="perfilEditar" style="display: none;">
            <h2>Editar Perfil</h2>
            <form>
                <label for="nuevaContraseña">Nueva Contraseña:</label>
                <input type="password" id="nuevaContraseña" name="nuevaContraseña" required>
                <button type="button" class="guardar-btn" onclick="guardarContraseña()">Guardar</button>
            </form>
            <div id="resultadoGuardar"></div>
        </div>
    </div>
    <button onclick="goBack()"  class="btn btn-secondary btn-lg" >Volver</button>

<script>
    function goBack() {
        window.history.back();
    }
</script>

</body>
</html>

<?php
} else {
    
    echo "La sesión no está definida.";
}
?>
