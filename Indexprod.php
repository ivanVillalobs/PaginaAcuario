<?php

session_start();

include ("Connection.php");

if (!isset($_SESSION['id_usuario'])) {
    // Definir la variable de sesión con un valor por defecto si no está establecida
    $_SESSION['id_usuario'] = 0;
}


if(isset($_GET['id'])){
    $id_producto = $_GET['id'];
    $resultado = $con->query("SELECT * FROM productos WHERE id  = $id_producto");
    if(mysqli_num_rows($resultado) > 0){
        $fila = mysqli_fetch_assoc($resultado);
        $nombreP = $fila['nombreP'];
        $preciop = $fila['preciop'];

        // $imagen = $fila['imagen'];

        // Establecer la variable $id_usuario
        $V = $_SESSION['id_usuario'] == 0 ? null : $_SESSION['id_usuario'];

        $cantidad = 1;

        // Aquí deberías insertar los datos en la tabla de carrito



    } else {
       // header("Location: ./productos.html");
    }
} else {
    //header("Location: ./productos.html");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acuario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="styleprod.css">
</head>

<body>
    <header class="header">

        <div class="menu container">

            <a href="#" class="logo">Acuario</a>

            <input type="checkbox" id="menu" />
            <label for="menu"><img src="IMG/menu.png" class="menu-icono" alt=""></label>
            <nav class="navbar">
                <ul>
                    <li><a href="Ubicacion.html">Ubicacion</a></li>
                    <li><a href="Acuario_descripcion.html">Misión y visión</a></li>
                    <li><a href="cerrarsesion.php">Cerrar Sesion</a></li>
		    <li><a href="http://10.0.0.4">Compras</a></li>
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

        <div class="header-content container">
            <div class="swiper mySwiper-1">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="header-info">
                            <div class="header-txt">
                                <H1>Promociones</H1>
                                <div class="prices">
                                    <p class="price-1">$199</p>
                                    <p class="price-2">$150</p>
                                </div>
                                <a href="#lista-1" class="btn-1">Informacion</a>
                            </div>
                            <div class="header-img">
                                <img src="IMG/bg1.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="header-info">
                            <div class="header-txt">
                                <H1>Productos nuevos</H1>
                                <div class="prices">
                                    <p class="price-1">$199</p>
                                    <p class="price-2">$150</p>
                                </div>
                                <a href="#lista-2" class="btn-1">Informacion</a>
                            </div>
                            <div class="header-img">
                                <img src="IMG/bg2.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="header-info">
                            <div class="header-txt">
                                <H1>Mas productos</H1>
                                <div class="prices">
                                    <p class="price-1">$199</p>
                                    <p class="price-2">$150</p>
                                </div>
                                <a href="#lista-3" class="btn-1">Informacion</a>
                            </div>
                            <div class="header-img">
                                <img src="IMG/bg3.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>

    </header>

    <hr>

    <section class="promos container" id="lista-1">

        <h2>promociones</h2>
        <div class="categories">


            <?php                    
                    $query = "SELECT * FROM productos";
                    $resultado = $con->query($query);
                    while($row = $resultado->fetch_assoc()){
            ?> 
            <div class="categoria">
                <div class="categoria-1">
                        <h3><?php echo $row['nombreP'] ?></h3>
                        <div class="prices">                        
                            <p class="precio">$<?php echo $row['preciop'] ?></p>
                        </div>
                        <!--<a href="#" id="butoncar"class="agregar-carrito btn-3" >Agregar al carrito</a>-->                        
                </div>
                    <div class="categoria-img">
                        <!--<img height="90px" src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']);?>">-->
                        <img width="90" height="90" src="pro/IMG/<?php echo $row['imagen']; ?>.jpg" />
                    </div> 
                    <form action="Agregar_Carrito.php" method="POST">
                        <input type="hidden" name="txtno_producto" value="<?php echo $row['id']; ?>">
                        <input type="number" name="txtcantidad" value="1" min="1" ><br><br>
                        <button class="agregar-carrito btn-3" id="Button" type="submit">Agregar al carito</button><br><br>
                    </form>         
            </div>                
            <?php
                }

            ?>

            </div>

           

        </div>

    </section>

    <hr>

    <section class="products container" id="lista-2">
        <h2>productos nuevos</h2>
        <div class="swiper mySwiper-2">
            <div class="swiper-wrapper">


        <?php
            $query = "SELECT * FROM productos";
            $resultado = $con->query($query);
            while($row = $resultado->fetch_assoc()){
        ?>

                <div class="swiper-slide">
                    <div class="product">
                    <img width="90" height="90" src="pro/IMG/<?php echo $row['imagen']; ?>.jpg" />
                        <div class="product-txt">
                            <h3><?php echo $row['nombreP'] ?></h3>
                            <p><?php echo $row['descripcionp'] ?></p>
                            <p class="precio">$<?php echo $row['preciop'] ?></p>
                            
                        </div>
                        <form action="Agregar_Carrito.php" method="POST">
                        <input type="hidden" name="txtno_producto" value="<?php echo $row['id']; ?>">
                        <input type="number" name="txtcantidad" value="1" min="1" ><br><br>
                        <button class="agregar-carrito btn-3" id="Button" type="submit">Agregar al carito</button><br><br>
                        </form> 
                    </div>
                </div>
        <?php
                         }

        ?>              

            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>


    </section>

    <hr>

    <section class="products container" id="lista-3">
        <h2>productos</h2>
        <div class="swiper mySwiper-2">
            <div class="swiper-wrapper">
                    <?php
                        $query = "SELECT * FROM productos";
                        $resultado = $con->query($query);
                        while($row = $resultado->fetch_assoc()){
                    ?>
                <div class="swiper-slide">
                    <div class="product">
                    <td><img width="90" height="90" src="pro/IMG/<?php echo $row['imagen']; ?>.jpg" /></td>
                        <div class="product-txt">
                            <h3><?php echo $row['nombreP'] ?></h3>
                            <p><?php echo $row['descripcionp'] ?></p>
                            <p class="precio">$<?php echo $row['preciop'] ?></p>
                            <!--<a href="" class="agregar-carrito btn-3" data-id="9">Agregar al carrito</a>-->
                        </div>
                        <form action="Agregar_Carrito.php" method="POST">
                        <input type="hidden" name="txtno_producto" value="<?php echo $row['id']; ?>">
                        <input type="number" name="txtcantidad" value="1" min="1" ><br><br>
                        <button class="agregar-carrito btn-3" id="Button" type="submit">Agregar al carito</button><br><br>
                        </form>
                    </div>
                </div>

                    <?php
                         }

                    ?>
            </div>

            
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>

    <footer class="footer container">
        <div class="link">
            <h3>INFO</h3>
            <ul>
                <li><a href="Ubicacion.html">ubicación</a></li>
                <li><a href="Acuario_descripcion.html">Misión y Visión</a></li>
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

    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="scriptprod.js"></script>
</body>

</html>
