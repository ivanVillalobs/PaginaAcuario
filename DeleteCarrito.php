<?php
include ("Connection.php");

$id = $_REQUEST['CarritoID'];

$query = "DELETE FROM car WHERE CarritoID  = '$id' ";
$resultado = $con->query($query);

if($resultado){
    header("Location:carritotabla.php");
}else{
    echo "Algo fallo";
}


?>