<?php
include ("../Connection.php");

$id = $_REQUEST['id'];

$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$descripcion = $_POST['descripcion'];
//$imagen = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));

try{
    file_put_contents("IMG/".$nombre.date('h-i-s').".jpg",file_get_contents($_FILES['Imagen']['tmp_name']));
}catch(Exception $e){
    echo "".$e;
}

$query = "UPDATE productos SET nombreP='$nombre', preciop='$precio',descripcionp='$descripcion',
 imagen= '".$nombre.date('h-i-s')."' WHERE id = '$id' ";
$resultado = $con->query($query);

if($resultado){
    
    header("Location:mostrarProductosADMIN.php");
    
}else{
    echo "Algo fallo".mysqli_error($con);
}


?>