<?php
include ("../Connection.php");

$id = $_REQUEST['id'];

$query = "DELETE FROM usuarios WHERE ID = '$id' ";
$resultado = $con->query($query);

if($resultado){
    header("Location:mostrarUsuariosADMIN.php");
}else{
    echo "Algo fallo";
}


?>