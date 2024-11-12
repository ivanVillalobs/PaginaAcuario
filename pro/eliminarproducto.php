<?php
include ("../Connection.php");

$id = $_REQUEST['id'];

$query = "DELETE FROM productos WHERE id = '$id' ";
$resultado = $con->query($query);

if($resultado){
    header("Location:mostrarProductosADMIN.php");
}else{
    echo "Algo fallo";
}


?>