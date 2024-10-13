<?php
require "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;

$host = "localhost";
$user = "root";
$password = "root";
$dbname = "acuario";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["token"]) && isset($_POST["nueva_contrasena"]) && isset($_POST["confirmar_contrasena"])) {
        $token = trim($_POST["token"]);
        $nueva_contrasena = trim($_POST["nueva_contrasena"]);
        $confirmar_contrasena = trim($_POST["confirmar_contrasena"]);

        // Validar que las contraseñas coincidan
        if ($nueva_contrasena !== $confirmar_contrasena) {
            echo "Las contraseñas no coinciden.";
            exit;
        }

        // Validar que la nueva contraseña cumpla con los requisitos
        if (strlen($nueva_contrasena) < 8 || !preg_match('/[A-Z]/', $nueva_contrasena) || !preg_match('/[0-9]/', $nueva_contrasena) || !preg_match('/[\W]/', $nueva_contrasena)) {
            echo "La contraseña debe tener al menos 8 caracteres, una letra mayúscula, un número y un carácter especial.";
            exit;
        }

        // Preparar la consulta para verificar el token
        $sql = "SELECT id FROM usuarios WHERE token = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $user_id = $row['id'];

            // Actualizar la contraseña
            $hashed_password = password_hash($nueva_contrasena, PASSWORD_DEFAULT);
            $sql = "UPDATE usuarios SET contrasena = ?, token = NULL WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $hashed_password, $user_id);
            $stmt->execute();

            // Redirigir a la vista de éxito
            header("Location: success.php");
            exit(); // Asegúrate de llamar a exit después de header para detener la ejecución
        } else {
            echo "Token inválido.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cambio de Contraseña</title>
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
        h2 {
            margin-bottom: 20px;
            font-size: 24px; /* Tamaño de fuente más grande */
            color: #007bff; /* Color azul para el título */
        }
        label {
            display: block; /* Mostrar etiqueta como bloque */
            margin-bottom: 5px;
            font-weight: bold; /* Negrita para las etiquetas */
        }
        .input-container {
            position: relative;
            width: 100%; /* Asegurarse de que el contenedor sea del 100% */
        }
        input[type="password"], input[type="text"] {
            width: 95%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: width 0.2s; /* Transición suave para evitar el cambio de tamaño */
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease; /* Transición suave al pasar el ratón */
        }
        button:hover {
            background-color: #0056b3; /* Color del botón al pasar el ratón */
        }
        .toggle-password {
            position: absolute;
            right: 10px; /* Ajustar posición del ícono */
            top: 30px; /* Ajustar posición del ícono */
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Cambiar Contraseña</h2>
        <form method="POST">
            <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>">
            
            <label for="nueva_contrasena">Nueva Contraseña:</label>
            <div class="input-container">
                <input type="password" name="nueva_contrasena" required id="nueva_contrasena">
                <img src="IMG/ojoA.png" alt="Mostrar" class="toggle-password" id="toggle-nueva" onclick="togglePassword('nueva_contrasena', 'toggle-nueva')">
            </div>

            <label for="confirmar_contrasena">Confirmar Contraseña:</label>
            <div class="input-container">
                <input type="password" name="confirmar_contrasena" required id="confirmar_contrasena">
                <img src="IMG/ojoA.png" alt="Mostrar" class="toggle-password" id="toggle-confirmar" onclick="togglePassword('confirmar_contrasena', 'toggle-confirmar')">
            </div>
            
            <button type="submit">Cambiar Contraseña</button>
        </form>
    </div>

    <script>
        let passwordVisible = {
            nueva: false,
            confirmar: false
        };

        function togglePassword(inputId, toggleId) {
            const input = document.getElementById(inputId);
            const isVisible = passwordVisible[toggleId === 'toggle-nueva' ? 'nueva' : 'confirmar'];

            input.setAttribute('type', isVisible ? 'password' : 'text');
            document.getElementById(toggleId).src = isVisible ? 'IMG/ojoA.png' : 'IMG/ojoC.png'; // Cambiar icono
            passwordVisible[toggleId === 'toggle-nueva' ? 'nueva' : 'confirmar'] = !isVisible;
        }
    </script>
</body>
</html>
