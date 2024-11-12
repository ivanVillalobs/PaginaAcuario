<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../EstilosMenu.css">
    <title>Usuarios</title>
</head>
<body>
<header class="header">

<div class="menu container">

    <a href="#" class="logo" >Acuario</a>

    <input type="checkbox" id="menu" />
    <label for="menu"><img src="IMG/menu.png" class="menu-icono" alt=""></label>
    <nav class="navbar">
        <ul>
            <li><a href="../pro/mostrarProductosADMIN.php">Productos</a></li>
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
                    <th colspan="10">Nuevo</th>
                </tr>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Contraseña</th>
                    <th colspan="2">operaciones</th>
                </tr>

            </thead>

            <tbody>
                <?php
                    include ("../Connection.php");

                    $query = "SELECT * FROM usuarios";
                    $resultado = $con->query($query);
                    while($row = $resultado->fetch_assoc()){
                        ?>
                            <tr>
                                <td><?php echo $row['ID'] ?></td>
                                <td><?php echo $row['Nombre'] ?></td>
                                <td><?php echo $row['Apellido_P'] ?></td>
                                <td><?php echo $row['Apellido_M'] ?></td>
                                <td><?php echo $row['correo'] ?></td>
                                <td><?php echo $row['telefono'] ?></td>
                                <td width="90" height="90"><?php echo $row['Direccion'] ?></td>
                                <td><a class="deletemod" href="modificarUsuariosADMIN.php?id=<?php echo $row['ID']?>">MODIFICAR</a> </th>
                                <td><a class="delete" href="eliminarusuario.php?id=<?php echo $row['ID']?>">ELIMINAR</a> </th>
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