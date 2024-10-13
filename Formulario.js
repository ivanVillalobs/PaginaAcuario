document.getElementById("btn__iniciar-sesion").addEventListener("click", login);
document.getElementById("btn__Register").addEventListener("click", register);
window.addEventListener("resize", anchopagina);

// Declarando variables
var contenedor_login_register = document.querySelector(".contenedor__login__register");
var formulario_login = document.querySelector(".formulario__login");
var formulario_register = document.querySelector(".formulario__register");
var caja_trasera_login = document.querySelector(".caja__trasera_login");
var caja_trasera_register = document.querySelector(".caja__trasera_register");

// Función para validar la contraseña
function validatePassword(password) {
    const passwordPattern = /^(?=.*[A-Z])(?=.*[0-9])(?=.*[\W_])[A-Za-z0-9\W_]{8,}$/;
    return passwordPattern.test(password);
}

// Validación del formulario de registro
formulario_register.addEventListener("submit", function(e) {
    const password = document.getElementById("contrasenaRegistro").value;
    const confirmPassword = document.getElementById("contrasenaConfirm").value;
    
    if (!validatePassword(password)) {
        e.preventDefault();
        alert("La contraseña debe tener al menos 8 caracteres, incluyendo una letra mayúscula, un número y un carácter especial.");
    } else if (password !== confirmPassword) {
        e.preventDefault();
        alert("Las contraseñas no coinciden.");
    }
});

// Manejador para mostrar/ocultar contraseñas
function togglePasswordVisibility(inputId, eyeIconId) {
    const passwordInput = document.getElementById(inputId);
    const eyeIcon = document.getElementById(eyeIconId);
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeIcon.src = "IMG/ojoA.png"; // Cambia a ojo abierto
    } else {
        passwordInput.type = "password";
        eyeIcon.src = "IMG/ojoC.png"; // Cambia a ojo cerrado
    }
}

// Para el formulario de registro
document.getElementById("togglePassword").addEventListener("click", function() {
    togglePasswordVisibility("contrasenaRegistro", "togglePassword");
});

document.getElementById("togglePasswordConfirm").addEventListener("click", function() {
    togglePasswordVisibility("contrasenaConfirm", "togglePasswordConfirm");
});

// Para el formulario de inicio de sesión (verificar IDs aquí)
document.getElementById("toggleLoginPassword").addEventListener("click", function() {
    togglePasswordVisibility("loginContrasena", "toggleLoginPassword");
});

function anchopagina() {
    if (window.innerWidth > 850) {
        caja_trasera_login.style.display = "block";
        caja_trasera_register.style.display = "block";
    } else {
        caja_trasera_register.style.display = "block";
        caja_trasera_register.style.opacity = "1";
        caja_trasera_login.style.display = "none";
        formulario_login.style.display = "block";
        formulario_register.style.display = "none";
        contenedor_login_register.style.left = "0px";
    }
}

anchopagina();

function login() {
    if (window.innerWidth > 850) {
        formulario_register.style.display = "none";
        contenedor_login_register.style.left = "10px";
        formulario_login.style.display = "block";
        caja_trasera_register.style.opacity = "1";
        caja_trasera_login.style.opacity = "0";
    } else {
        formulario_register.style.display = "none";
        contenedor_login_register.style.left = "0px";
        formulario_login.style.display = "block";
        caja_trasera_register.style.display = "block";
        caja_trasera_login.style.display = "none";
    }
}

function register() {
    if (window.innerWidth > 850) {
        formulario_register.style.display = "block";
        contenedor_login_register.style.left = "410px";
        formulario_login.style.display = "none";
        caja_trasera_register.style.opacity = "0";
        caja_trasera_login.style.opacity = "1";        
    } else {
        formulario_register.style.display = "block";
        contenedor_login_register.style.left = "0px";
        formulario_login.style.display = "none";
        caja_trasera_register.style.display = "none";
        caja_trasera_login.style.display = "block";
        caja_trasera_login.style.opacity = "1";
    }
}
