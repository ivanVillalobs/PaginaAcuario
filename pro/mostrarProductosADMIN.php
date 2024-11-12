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
    <link rel="stylesheet" href="../EstilosMenu.css">


    <title>Practica 1</title>
</head>
<body>
<header class="header">

<div class="menu container">

    <a href="#" class="logo" >Acuario</a>

    <input type="checkbox" id="menu" />
    <label for="menu"><img src="IMG/menu.png" class="menu-icono" alt=""></label>
    <nav class="navbar">
        <ul>
            <li><a href="../USUARIOS/mostrarUsuariosADMIN.php">Usuarios</a></li>
            <li><a href="../cerrarcesion.php">Cerrar Sesion</a></li>
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
<section class="InventarioConsulta">
        <center>
        <table>
            <thead>
                <tr>
                    <th class="Crto" colspan="7"><a href="ProductosADMIN.php">Nuevo</th>
                </tr>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Descripcion</th>
                    <th>Imagen</th>
                    <th colspan="2">operaciones</th>
                </tr>

            </thead>

            <tbody>
                <?php
                    include ("../Connection.php");

                    $query = "SELECT * FROM productos";
                    $resultado = $con->query($query);
                    while($row = $resultado->fetch_assoc()){
                        ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['nombreP'] ?></td>
                                <td><?php echo $row['preciop'] ?></td>
                                <td><?php echo $row['descripcionp'] ?></td>
                                <td><img width="90" height="90" src="IMG/<?php echo $row['imagen']; ?>.jpg" /></td>
                                <td><a class="deletemod" href="modificarProductosADMIN.php?id=<?php echo $row['id']?>">MODIFICAR</a> </th>
                                <td><a class="delete" href="eliminarproducto.php?id=<?php echo $row['id']?>">ELIMINAR</a> </th>
                            </tr>
                        <?php
                    }

                ?>
            </tbody>
        </table>
        </center>
    </section>
</header>
<br>
 
</body>
</html>