<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contraseña Cambiada</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e7f3f9; /* Color de fondo más claro */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #333; /* Color del texto */
        }
        .container {
            background-color: rgba(176, 176, 176, 0.5); /* Fondo blanco para mayor contraste */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 350px; /* Ancho del contenedor */
            text-align: center; /* Centrar el texto */
        }
        h1 {
            margin-bottom: 15px;
            font-size: 24px; /* Tamaño de fuente más grande */
            color: #007bff; /* Color azul para el título */
        }
        p {
            margin-bottom: 20px;
            font-size: 16px; /* Tamaño de fuente del párrafo */
        }
        a {
            display: inline-block; /* Hacer que el enlace se comporte como un botón */
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #0056b3; /* Color del enlace al pasar el ratón */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>¡Contraseña Cambiada Exitosamente!</h1>
        <p>Tu contraseña ha sido cambiada con éxito. Ahora puedes iniciar sesión con tu nueva contraseña.</p>
        <a href="http://localhost/proyecto/registrologin.html">Iniciar Sesión</a> <!-- Redirigir a la página de inicio de sesión -->
    </div>
</body>
</html>
