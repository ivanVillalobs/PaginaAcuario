<?php

session_start();

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
                    <li><a href="indexprod.php">Productos</a></li>
                    <li><a href="Acuario_descripcion.html">Misión y visión</a></li>
                    <li><a href="cerrarsesion.php">Cerrar Sesion</a></li>
                </ul>
            </nav>
        </div>    
    <section id="seccion">
        <?php
    $ruta = "../PDF";
    $id = "33"; // Reemplaza "tu_valor_id" con el valor de ID que deseas comparar
    obtener_estructura_directorios($ruta, $id);
    
    function obtener_estructura_directorios($ruta, $id) {
        // Se comprueba que realmente sea la ruta de un directorio
        if (is_dir($ruta)) {
            // Abre un gestor de directorios para la ruta indicada
            $gestor = opendir($ruta);
            ?>
            <table class="tablita">
            <tr>
            <th colspan="2" class="tit">Pedidos</th>
            </tr>
<?php
            // Recorre todos los elementos del directorio
            while (($archivo = readdir($gestor)) !== false) {
                $ruta_completa = $ruta . "/" . $archivo;

                // Se muestran todos los archivos y carpetas excepto "." y ".."
                if ($archivo != "." && $archivo != "..") {
                    // Si es un directorio se recorre recursivamente
                    if (is_dir($ruta_completa)) {
                        obtener_estructura_directorios($ruta_completa, $id);
                    } else {
                        // Comprobar si el número deseado está contenido en el nombre del archivo
                        if (strpos($archivo, $id) !== false) {
                            ?>
                                <tr>
                                    <td class="arc">Archivo: </td>
                                    <td class="arch"><a clas="linksa" href="<?php echo $ruta . '/' . $archivo; ?>"><?php echo $archivo; ?></a></td>
                                </tr>
                            <?php                            
                        }
                    }
                }
            }

            // Cierra el gestor de directorios
            closedir($gestor);
            echo "</table>";
        } else {
            echo "No es una ruta de directorio válida<br/>";
        }
    }
    
?>
    </section>
    </header>
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
