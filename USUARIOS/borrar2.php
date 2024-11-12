<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>
<body>
    <section class="form">
        <form action="GuardarProducto.php" method="post" enctype="multipart/form-data">
        <input type="text" REQUIRED name="nombre" placeholder="Nombre...." value=""/>
        <input type="number" REQUIRED name="precio" placeholder="Precio...." value=""/>
        <input type="text" REQUIRED name="descripcion" placeholder="descripcion...." value=""/>
        <input type="file" REQUIRED name="Imagen">
        <input type="submit" value="Aceptar">
    </form>
    </section>
</body>
</html>