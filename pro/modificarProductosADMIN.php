<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>
<body>
    <?php
        include ("../Connection.php");
        $id = $_REQUEST['id'];
        $query = "SELECT * FROM productos where id='$id'";
        $resultado = $con->query($query);
        $row = $resultado->fetch_assoc();
    ?>
    <section class="form">
        <form action="procesomodificar.php?id=<?php echo $row['id'];?>" method="post" enctype="multipart/form-data">
        <input type="text" REQUIRED name="nombre" placeholder="Nombre...." value="<?php echo $row['nombreP']; ?>"/>
        <input type="number" REQUIRED name="precio" placeholder="Precio...." value="<?php echo $row['preciop']; ?>"/>
        <input type="text" REQUIRED name="descripcion" placeholder="descripcion...." value="<?php echo $row['descripcionp']; ?>"/>    
        <img width="90" height="90" src="IMG/<?php echo $row['imagen']; ?>.jpg" />
        <input type="file" REQUIRED name="Imagen">
        <input type="submit" value="Aceptar">
    </form>
    </section>
</body>
</html>