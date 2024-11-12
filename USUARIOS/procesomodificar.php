<?php
include ("../Connection.php");

$id = $_REQUEST['id'];

$nombre = $_POST['nombre'];
$Apellido_P = $_POST['apellidoP'];
$Apellido_M = $_POST['apellidoM'];
$correo = $_POST['Correo'];
$telefono = $_POST['telefono'];
$Direccion = $_POST['direccion'];

$query = "UPDATE usuarios SET Nombre = '$nombre', Apellido_P = '$Apellido_P',
Apellido_M = '$Apellido_M', correo = '$correo', telefono = '$telefono', 
Direccion = '$Direccion' WHERE ID = '$id' ";
$resultado = $con->query($query);

if($resultado){
    header("Location: mostrarUsuariosADMIN.php");

}else{
    echo "Algo fallo";
    echo "$id";
}


?>