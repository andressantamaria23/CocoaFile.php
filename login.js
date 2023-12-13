const btnSignIn = document.getElementById("sign-in"),
      btnSignUp = document.getElementById("sign-up"),
      formRegister = document.querySelector(".register"),
      formLogin = document.querySelector(".login");

btnSignIn.addEventListener("click", e => {
    formRegister.classList.add("hide");
    formLogin.classList.remove("hide");
})

btnSignUp.addEventListener("click", e => {
    formLogin.classList.add("hide");
    formRegister.classList.remove("hide");
})
function logear()
{

    let user1 = document.getElementById("login-email").value
    let pass1 = document.getElementById("login-password").value
    let user2 = document.getElementById("login-email").value
    let pass2 = document.getElementById("login-password").value
    let user3 = document.getElementById("login-email").value
    let pass3 = document.getElementById("login-password").value


if(user1=="Andres@gmail.com"&& pass1 == "1234"){

    window.location="Inventario/indexI.php"

}else if(user2== "Luisa@gmail.com"&& pass2 =="1234"){

    window.location="Documentacion/documentacion.html"

}else if(user3== "Admin@gmail.com" && pass3 =="1234"){

    window.location="Admin/ADMINISTRADOR.html"

}else{
    alert("Datos incorrectos");
}

} 

function regresar(){

    window.location="login.html"
}

function enviar(){
    
    let user1 = document.getElementById("login-email").value;
    let user2 = document.getElementById("login-email").value;

function validarEmail(email) {
    
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
}
if (validarEmail(user1)&& user1=="Andres@gmail.com") {
    window.location = "Contraseña.html";
} else if (validarEmail(user2) && user2 =="Luisa@gmail.com") {
    window.location = "Contraseña.html";
} else {
    alert("Datos incorrectos");
}}