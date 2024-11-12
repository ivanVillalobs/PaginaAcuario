<?php

require "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
include "fpdf.php";

$host = "localhost";
$user = "root";
$password = "root";
$dbname = "acuario";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si 'correo' está definido en $_POST
    if (isset($_POST["correo"]) && !empty(trim($_POST["correo"]))) {
        $email = trim($_POST["correo"]); // Obtener el correo del formulario

        // Verifica que el correo tenga un formato válido
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Por favor, introduce un correo electrónico válido.";
            exit;
        }

        // Prepara la consulta
        $sql = "SELECT id FROM usuarios WHERE correo = ?";
        $stmt = $conn->prepare($sql);

        // Verifica si la preparación fue exitosa
        if (!$stmt) {
            die("Error al preparar la consulta: " . $conn->error);
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $token = bin2hex(random_bytes(16));
            $row = $result->fetch_assoc();
            $user_id = $row['id'];

            $sql = "UPDATE usuarios SET token = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);

            // Verifica si la preparación fue exitosa
            if (!$stmt) {
                die("Error al preparar la actualización: " . $conn->error);
            }

            $stmt->bind_param("si", $token, $user_id);
            $stmt->execute();

            // Configuración del correo
            $mail = new PHPMailer(true);
            try {
                // Configuración del servidor SMTP
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'ivancito.invc@gmail.com'; // Tu correo de Gmail
                $mail->Password = 'edim pyvt drrt ahdu'; // Contraseña del correo o contraseña de aplicación
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Remitente y destinatario
                $mail->setFrom('tu_correo@gmail.com', 'Acuario Perrón');
                $mail->addAddress($email);

                // Contenido del correo
                $mail->isHTML(true);
                $mail->Subject = 'Recuperacion de Contraseña';
                $mail->Body    = "Haz clic en el siguiente enlace para cambiar tu contraseña: 
                                  <a href='http://localhost/proyecto/cambioPass.php?token=$token'>Cambiar Contraseña</a>";

                $mail->send();
                echo 'Correo enviado correctamente.';
            } catch (Exception $e) {
                echo "Error al enviar el correo: {$mail->ErrorInfo}";
            }
        } else {
            echo "El correo no está registrado.";
        }

        $stmt->close();
    } else {
        echo "Por favor, introduce un correo electrónico."; // Mensaje si no se introduce un correo
    }
}
$conn->close();
?>