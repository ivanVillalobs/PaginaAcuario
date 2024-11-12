<?php
session_start();

include "Connection.php";

require "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
include "fpdf.php";

var_dump($_SESSION);

$id_usuario = $_SESSION['id_usuario']; 
$Nombre = $_SESSION['Nombre'];
$telefono = $_SESSION['telefono'];
$correo = $_SESSION['correo'];
//$total = $_SESSION['total'];
$productos = json_decode($_SESSION["productos"]);
header("location: carritotabla.php");
$producto = $productos[0]->nombre_producto;


$sql_historial = "SELECT * FROM ventas WHERE UsuarioID = $id_usuario";
$resultado_historial = $con->query($sql_historial);
$datos_historial = mysqli_fetch_assoc($resultado_historial);

$sql_carrito = "SELECT * FROM car WHERE id_Usuario  = $id_usuario";
$resultado_carrito = $con->query($sql_carrito);

$sql_usuario = "SELECT * FROM usuarios WHERE Nombre = '$Nombre' and correo = '$correo'
 and telefono = '$telefono'";
$resultado_usuario = $con->query($sql_usuario);
$datos_usuario = mysqli_fetch_assoc($resultado_usuario);


 $sql_busqueda = "SELECT * FROM usuarios WHERE  Nombre = '$Nombre' and correo = '$correo'
 and telefono = '$telefono' ";




    //include ".php";

    // Crear un nuevo objeto FPDF
    $pdf = new FPDF();

    // Agregar una nueva página al PDF
    $pdf->AddPage();

    // Generar el contenido del PDF
    $pdf->SetFont('Arial', 'B', 18);
    $pdf->Cell(0, 10, 'Acuario Agradece su compra', 0, 1);
    $pdf->Ln(10); // Cambio de ln a Ln
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 10, 'Para: ' . $Nombre, 0, 1); 
    $pdf->Cell(0, 10, 'Telefono: ' . $telefono, 0, 1);
//    $pdf->Cell(0, 10, 'Productos:', 0, 1);

    if ($resultado_carrito && $resultado_carrito->num_rows > 0) {
        while ($fila_carrito = mysqli_fetch_assoc($resultado_carrito)) {
            // Obtener los datos específicos del carrito
            $nombre_producto = $fila_carrito['nombre_producto'];   

            $pdf->Cell(0, 10, "\t\t$nombre_producto", 0, 1);
            
        }
    }
    $fecha = date('l jS \of F Y h:i:s A');
    $pdf->Cell(0, 10, 'Fecha: ' . $fecha, 0, 1); // Cambio de $datos_historial['fecha'] a $fecha
    //$pdf->Cell(0, 10, 'Total: $' . $total, 0, 1); // Cambio de $datos_historial['total'] a $total

      // Guardar el PDF en el servidor
    $pdfPath = 'pdf/orden'.$id_usuario.'_'.time().'.pdf';
    $pdf->Output($pdfPath, 'F');

    // Definir los encabezados del correo electrónico
    $mail = new PHPMailer();
	$mail->CharSet = 'utf-8';
	$mail->Host = "smtp.gmail.com"; //Host = "smtp.googlemail.com";
	$mail->From = "ivancito.invc@gmail.com";
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->Username = "ivancito.invc@gmail.com";
	$mail->Password = "nsohwfdzurbwahoe";
	$mail->SMTPSecure = "STARTTLS";
	$mail->Port = 587;
	$mail->AddAddress($correo);
	$mail->SMTPDebug = 2;   //Muestra las trazas del mail, 0 para ocultarla
	$mail->isHTML(true);                                  // Set email format to HTML
	$mail->Subject = 'Gracias por su preferencia!';
	$mail->Body = '<b>Adjuntamos un resumen de tu compra Wapo</b>';
	$mail->AltBody = 'Te mandamos el resumen de tu compra';

	$inMailFileName = "recibo.pdf";
	$filePath = "PDF/orden$id_usuario.pdf";
	$mail->AddAttachment($filePath, $inMailFileName);

	$mail->send();
   


    $fechacompra = date('y-m-d h:i:s');

    $sql = mysqli_query($con,"INSERT INTO ventas (VentaID , UsuarioID, Fecha_compra, Total) 
    VALUES (0, '$id_usuario', '$fechacompra','1000') ");
    

    if ($sql){

    
        $sql = mysqli_query($con,"DELETE FROM car where id_Usuario  = '$id_usuario' ");
    
        if ($sql){
            
           // header ("location: indexprod.php");
        
        }else {
            echo "algo fallo en el proceso.";
        
        }
        
    
    
    }else {
        echo "fallo el registro".mysqli_error($con);
    
    }


    ?>
