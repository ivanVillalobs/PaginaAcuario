<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Esta line es para traer a llamar el css-->
    <link rel="stylesheet" href="Estilo.css">
    <link rel="stylesheet" href="EstiloDos.css">
    <link rel="stylesheet" href="Estilo3.css">
    <link rel="stylesheet" href="EstilosMenu.css">


    <title>Practica 1</title>
</head>

<body>
<header class="header">

<div class="menu container">

    <a href="#" class="logo">Acuario</a>

    <input type="checkbox" id="menu" />
    <label for="menu"><img src="IMG/menu.png" class="menu-icono" alt=""></label>
    <nav class="navbar">
        <ul>
            <li><a href="Indexprod.php">Productos</a></li>
            <li><a href="Ubicacion.html">Ubicacion</a></li>
            <li><a href="Acuario_descripcion.html">Mision y vision</a></li>
            <li><a href="cerrarsesion.php">Cerrar Sesion</a></li>
        </ul>

    </nav>

    <div>
        <ul>
            <li class="submenu">
                <a href="carritotabla.php"><img src="IMG/car.png" id="img-carrito" alt=""></a>
                <div id="carrito">
                    <table id="lista-carrito">
                        <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                    <a href="#" id="vaciar-carrito" class="btn-3">Vaciar Carrito</a>                            
                </div>
            </li>
        </ul>
    </div>
</div>
<div class="InventarioConsulta">
        <center>
            <br><br><table>
                <thead>
                    <th colspan="10" class="Carrito">Carrito</a></th>
                    <tr>
                        <th>Carrito ID</th>
                        <th>ID Usuario</th>
                        <th>ID producto</th>
                        <th>Nombre Usuario</th>
                        <th>Nombre Producto</th>
                        <th>Imagen Producto</th>
                        <th>Precio Producto</th>
                        <th>Cantidad</th>
                        <th colspan="2">Operaciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php



    include ("Connection.php");

    // Obtener el id del usuario logueado
    session_start();
    $id_usuario = $_SESSION['id_usuario'];
    $array = [];



    $sql_busqueda = "SELECT * FROM car WHERE id_Usuario = '$id_usuario'";

    $sql_query = mysqli_query($con,$sql_busqueda); 

    while($row = mysqli_fetch_array($sql_query)){
        ?>
                        <tr>
                            <td><?php echo $row ['CarritoID']; ?></td>
                            <td><?php echo $row['id_Usuario']; ?></td>
                            <td><?php echo $row['id_producto']; ?></td>
                            <td><?php echo $row['nombre_usuario']; ?></td>
                            <td><?php echo $row['nombre_producto']; ?></td>
                            <td><img width="90" height="90" src="pro/IMG/<?php echo $row['imagen_producto']; ?>.jpg" /></td>
                            <td><label>$</label><?php echo $row['precio_producto']; ?></td>
                            <td><?php echo $row['cantidad']; ?></td>
                            <td><a class="delete" href="DeleteCarrito.php?CarritoID=<?php echo $row['CarritoID']; ?>">Eliminar</a></td>
                        </tr>
                    <?php        
                    }
                    $_SESSION["productos"]=json_encode($array);
                    ?>
                        <form action="enviarcorreo.php" method="get">
                                <form action="PDF/index_webdab.php">
                                <button class="delete1" onclick="alert('Compra exitosa');">Comprar carrito</button>
                                </form>
                                <!--href="DeleteCarrito.php?id_Usuario=<?php //echo $row['id_Usuario']; ?>"-->
                                <!--<input type="submit"value ="Comprar carrito">-->                            
                        </form>
                        
                </tbody>
            </table>                    
        </center>

    </div>
</header>
<br>
<hr>
    <!--</article>-->
    <!-- <section class="Container_2"> -->

    <footer class="footer container">
        <div class="link">
            <h3>INFO</h3>
            <ul>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Instagram</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Tiktok</a></li>
            </ul>
        </div>
        <div class="link">
            <h3></h3>
            <p>
            </p>
        </div>
        <div class="link">
            <h3>Acuario</h3>
            <p>
            En Acuario, Nos Apasiona El Mundo De Los Acuarios Y Los Peces. Desde Nuestro Inicio En 2023, Hemos Estado Dedicados A Brindar A Nuestros Clientes Los Mejores Productos Y Servicios Relacionados Con Los Acuarios Y Los Peces.
            </p>
        </div>
        <div class="link">
            <h3></h3>
            <p>        
            </p>
        </div>
        <div class="link">
            <h3>Acuario</h3>
            <p>
            Gracias Por Elegir Acuario. Esperamos Poder Servirle En Todas Sus Necesidades De Acuarios Y Peces.
            </p>
        </div>        
    </footer> 
</body>
</html>
