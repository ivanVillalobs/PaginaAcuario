<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>usuarios</title>
</head>
<body>
    <?php
        include ("../Connection.php");
        $id = $_REQUEST['id'];
        $query = "SELECT * FROM usuarios where id='$id'";
        $resultado = $con->query($query);
        $row = $resultado->fetch_assoc();
    ?>
    <section class="form">
        <form action="procesomodificar.php?id=<?php echo $row['ID'];?>" method="post" enctype="multipart/form-data">
        <input type="text" REQUIRED name="nombre" placeholder="Nombre...." value="<?php echo $row['Nombre']; ?>"/>
        <input type="text" REQUIRED name="apellidoP" placeholder="ApellidoP...." value="<?php echo $row['Apellido_P']; ?>"/>
        <input type="text" REQUIRED name="apellidoM" placeholder="ApellidoM...." value="<?php echo $row['Apellido_M']; ?>"/>
        <input type="text" REQUIRED name="Correo" placeholder="Correo...." value="<?php echo $row['correo']; ?>"/>
        <input type="number" REQUIRED name="telefono" placeholder="Telefono...." value="<?php echo $row['telefono']; ?>"/>
        <input type="text" REQUIRED name="direccion" placeholder="Direccion...." value="<?php echo $row['Direccion']; ?>"/>
        <input type="submit" value="Aceptar">
    </form>
    </section>
</body>
</html>