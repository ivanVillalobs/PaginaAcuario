<?php
$SERVER = "localhost";
$database = "acuario";
$username = "root";
$password = "root";

// Establecer la conexión
$con = mysqli_connect($SERVER, $username, $password, $database);

// Verificar la conexión
if (!$con) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
