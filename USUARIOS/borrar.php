<?php
include ("../Connection.php");

$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$descripcion = $_POST['descripcion'];
$imagen = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));

$query = "INSERT INTO productos(nombreP,precioP,descripcionP,imagen) VALUES('$nombre','$precio','$descripcion','$imagen')";
$resultado = $con->query($query);

if($resultado){
    header("Location:mostrarProductosADMIN.php");
}else{
    echo "Algo fallo";
}


?>