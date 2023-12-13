function editarPerfil() {
    document.getElementById("perfilInfo").style.display = "none";
    document.getElementById("perfilEditar").style.display = "block";
}

function guardarContraseña() {
    var nuevaContraseña = document.getElementById("nuevaContraseña").value;

    // Simulando la lógica de guardar la contraseña
    // Aquí deberías implementar la lógica real para guardar la contraseña,
    // por ejemplo, podrías enviarla a un servidor a través de una solicitud AJAX.
    
    document.getElementById("mostrarContraseña").textContent = "Contraseña: " + nuevaContraseña;
    document.getElementById("resultadoGuardar").innerHTML = "Contraseña guardada: " + nuevaContraseña;
}