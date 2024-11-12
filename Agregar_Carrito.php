<?php
// Agregar producto al carrito

session_start();


include ("Connection.php");

if(!$con){
    die("No hay conexion".mysqli_connect_error());
}

// Variables para conectar
$id_producto = $_POST['txtno_producto'];
$cantidad = $_POST['txtcantidad'];
//$imagen = addslashes(file_get_contents($_FILES['imagen']));
var_dump($id_producto);

if(isset($_SESSION['id_usuario'])){
    // El usuario ha iniciado sesión, podemos agregar el producto al carrito
    $UsuarioID = $_SESSION['id_usuario'];
    
    // Consulta para agregar el producto al carrito
    $usuarios = mysqli_query($con, "SELECT Nombre FROM usuarios WHERE ID = ".$UsuarioID);
    $usuarios = mysqli_fetch_assoc($usuarios);

    $invproductos = mysqli_query($con, "SELECT * FROM productos WHERE id  = ".$id_producto);
    $invproductos = mysqli_fetch_assoc($invproductos);

    $query = mysqli_query($con, "INSERT INTO car (CarritoID, id_Usuario, nombre_usuario, nombre_producto, 
    imagen_producto, precio_producto, id_producto, cantidad) 
    VALUES (0,'".$UsuarioID."','".$usuarios['Nombre']."','".$invproductos['nombreP']."', 
    '".$invproductos['imagen']."','".$invproductos['preciop']."','".$id_producto."', '".$cantidad."')");
       
/*
    $query = mysqli_query($con, "INSERT INTO carrito (id_Usuario, nombre_usuario, nombre_producto, 
    imagen_producto, precio_producto, id_producto, cantidad) 
    VALUES ('".$UsuarioID."','".$usuarios['Nombre']."','".$invproductos['Producto']."', 
    '".$invproductos['ImgProducto']."','".$invproductos['Precio']."','".$id_producto."', '".$cantidad."')");
*/

    if($query){
        header ("location: carritotabla.php");
    } else {
        echo "Error al agregar el producto al carrito.".mysqli_error($con);
    }
} else {
    // El usuario no ha iniciado sesión, no podemos agregar el producto al carrito
    echo "Debe iniciar sesión antes de agregar un producto al carrito.";
}
?>