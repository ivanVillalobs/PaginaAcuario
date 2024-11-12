<?php
session_start();

include "Connection.php";

if (!$con) {
    die("No hay conexión: " . mysqli_connect_error());
}

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

// Obtener el usuario por correo
$resultado = mysqli_query($con, "SELECT * FROM usuarios WHERE correo = '$correo'");

if (mysqli_num_rows($resultado) == 1) {
    // Obtener el registro del usuario
    $usuario = mysqli_fetch_array($resultado);
    
    // Verificar la contraseña
    if (password_verify($contrasena, $usuario['Contrasena'])) {
        // La contraseña es correcta

        // Guarda la información del usuario en la sesión
        $_SESSION['id_usuario'] = $usuario['ID'];
        $_SESSION['Nombre'] = $usuario['Nombre'];
        $_SESSION['telefono'] = $usuario['telefono'];
        $_SESSION['correo'] = $correo;

        // Redirige al usuario según su PerfilID
        if ($usuario['PerfilID'] == 1) {
            header("Location: pro/mostrarProductosADMIN.php");
        } elseif ($usuario['PerfilID'] == 2) {
            header("Location: Indexprod.php");
        }
        
        exit(); // Finaliza el script después de la redirección

    } else {
        // La contraseña es incorrecta
        echo "Contraseña incorrecta. Inténtalo de nuevo.";
    }
} else {
    // El correo no existe
    echo "Correo no encontrado.";
}
?>
