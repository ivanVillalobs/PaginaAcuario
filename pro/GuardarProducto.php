<?php
include ("../Connection.php");

$nombre = $_POST['txtnombre'];
$precio = $_POST['txtprecio'];
$descripcion = $_POST['txtdescripcion'];
//$imagen = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));

try{
    file_put_contents("IMG/".$nombre.date('h-i-s').".jpg",file_get_contents($_FILES['txtImagen']['tmp_name']));
}catch(Exception $e){
    echo "".$e;
}

var_dump($_FILES);

echo $nombre;

$sql2 = mysqli_query($con,"INSERT INTO productos (id,nombreP, preciop, descripcionp, imagen) 
VALUES (0,'".$nombre."', '".$precio."', '".$descripcion."' , '".$nombre.date('h-i-s')."') ");

if ($sql2){
    header("Location:mostrarProductosADMIN.php");
}else{
    echo "Algo fallo".mysqli_error($con);
    
}


/*

$query = "INSERT INTO productos(nombreP,precioP,descripcionP,imagen) VALUES('$nombre','$precio','$descripcion','$imagen')";
$resultado = $con->query($query);

if($resultado){
    header("Location:mostrarProductosADMIN.php");
}else{
    echo "Algo fallo";
}

*/
?>