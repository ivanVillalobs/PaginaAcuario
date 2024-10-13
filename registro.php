<?php
    include "Connection.php";

    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellidoP = $_POST['ApellidoP'];
    $apellidoM = $_POST['ApellidoM'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];

    // Encriptar la contraseña
    $contrasena_encriptada = password_hash($contrasena, PASSWORD_BCRYPT);

    // Preparar la consulta SQL
    $sql = "INSERT INTO usuarios (Nombre, Apellido_P, Apellido_M, Correo, Contrasena, telefono, Direccion) 
            VALUES ('$nombre', '$apellidoP', '$apellidoM', '$correo', '$contrasena_encriptada', '$telefono', '$direccion')";

    // Ejecutar la consulta y verificar si fue exitosa
    if (mysqli_query($con, $sql)) {
        // Redirigir a la página de inicio de sesión si el registro fue exitoso
        header("Location: registrologin.html");
        exit();
    } else {
        // Mostrar un mensaje de error si la consulta falló
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    // Cerrar la conexión
    mysqli_close($con);
?>
