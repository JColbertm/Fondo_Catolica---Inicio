<?php
//============================================================+
// File name   : example_048.php
// Begin       : 2009-03-20
// Last Update : 2013-05-14
//
// Description : Example 048 for TCPDF class
//               HTML tables and table headers
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: HTML tables and table headers
 * @author Nicola Asuni
 * @since 2009-03-20
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');
		include("databaseA.php");
  
// get data from users table
		if(isset($_POST['idprestamo_im'])){
			$id=$_POST['idprestamo_im'];
		}
// 		if(isset($_POST['idpro'])){
// 			$id=$_POST['idpro'];
// 		}



// $row= execSqlA("SELECT * FROM programacion WHERE idProgramacion = \"".$id."\"");

// while ($data = mysqli_fetch_array($row)){
// $idDireccion=$data['idDireccion'];
// $idDia=$data['idDia'];			  
// $fecha = $data['fecha'];
// $tiempo = $data['tiempo'];
// $tec = $data['tec'];
// $fis = $data['fis'];
// $tac = $data['tac'];
// $psi = $data['psi'];
// $comp = $data['comp'];
// $ejer1= $data['ejer1'];
// $ejer11= $data['ejer11'];
// $ejer2= $data['ejer2'];
// $ejer22= $data['ejer22'];
// $ejer3= $data['ejer3'];
// $ejer33= $data['ejer33'];
// $ejer4= $data['ejer4'];
// $ejer44= $data['ejer44'];
// $ejer5= $data['ejer5'];
// $ejer55= $data['ejer55'];
  // }

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// ---------------------------------------------------------
// set margins
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);// add a page
$pdf->AddPage();
$image_file = K_PATH_IMAGES.'alpha.png';


$pdf->SetFont('helvetica', '', 10);


// set default header data
$htmlcontent = '

        <div>
            <h2 style="text-align: right;">FORMULARIO "A"</h2>
            <h2 style="text-align: center;">FONDO DE AHORRO Y CREDITO "SAN PABLO"</h2>
            <h1 style="text-align: center;">SOLICITUD PRESTAMO</h1>
        </div>
        Solicitud Nº .................................          Fecha:.........................................
        <br><br>
CI: ............................................
<br><br>
Nombres y Apellidos: .................................................................................................................
<br><br>
Dirección: ............................................................................  Nº de Celular: ............................<br><br>
Departamento UCB:……………………………………………..   Interno: …………………………<br><br>
Correo Electrónico: …………………………………………………………………………………….<br><br>
Señores del Comité de Crédito:<br><br>
Presento a Uds. mi solicitud de préstamo por la cantidad de Bs ...............................................<br><br>
Comprometiéndome a su total cancelación en un plazo de ...................................... meses.<br><br>
a ................................, mas el interés del 1% sobre saldo.<br><br>
También me comprometo a seguir aportando la cantidad de Bs ............................... <br><br>mensual, este monto acepté voluntariamente a que se me descuente por planilla.<br><br>

Ofrezco como garantía personal:<br><br>
Nombre y Apellido................................................................  CI:……………………………..<br><br>
En caso de incumplimiento de pago, yo garante asumo la totalidad de la deuda contraída.<br><br>
Nº de Cheque:………………….<br><br><br><br>




<p style="text-align: center;">FIRMA DEL SOLICITANTE  <>................................<>       FIRMA DEL GARANTE<br></p>
<p style="text-align: center;">
DATOS ECONÓMICOS DEL SOLICITANTE<br><br>
Total Ganado: ................................<br><br>
Liquido pagable: ............................<br><br><br><br>
</p>

  <p style="text-align: center;">PDTE. COMITÉ ADMINISTRATIVO   <>................................<>       PDTE. COMITÉ DE CRÉDITO</p>

'; 

$w = 30;
$h = 20;
// Example of Image from data stream ('PHP rules')
// $ser='images/lp.jpg';
// $pdf->Image($ser, 20, 11, $w, $h, 'JPG', '', '', false, 300, '', false, false, 0, 0, false, false);
//$image_mask = $pdf->Image("images/image_alpha.png", 50, 50, 100, '', '', '', '', false, 300, '', true, false);
//$pdf->Image("images/image.png", 50, 50, 100, '', '', '', '', false, 300, '', false, $image_mask);

$pdf->writeHTML($htmlcontent, true, 0, true, 0);

// reset pointer to the last page
$pdf->lastPage();


// -----------------------------------------------------------------------------
//Close and output PDF document
$pdf->Output('prestamo.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+