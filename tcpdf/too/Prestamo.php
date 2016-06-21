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
 include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/clases/databaseA.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/Fondo_Catolica/clases/claseUsuario.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/Fondo_Catolica/clases/claseAfiliacion.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/Fondo_Catolica/clases/claseHistorial2.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/Fondo_Catolica/clases/clasePrestamo.php";
  
// get data from users table
		if(isset($_GET['idprestamo_im'])){
			$id=$_GET['idprestamo_im'];
		}
      $idSol=$_GET['idprestamo_im'];
      $solicitud=ClasePrestamo::solicitud_por_id($id);
      $usuario=ClaseUsuario::encontrar_por_id($solicitud->idUsuario);
      $ci=$usuario->ci;
      $nombre=$usuario->nombre;
      $nombre2= $usuario->nombre2;
      $apellido_p= $usuario->apellido_p;
      $apellido_m=$usuario->apellido_m;
      $direccion= $usuario->direccion;
      $telefono=$usuario->telefono;
      $celular=$usuario->celular;
      $departamento=$usuario->departamento;
      $correos=$usuario->correos;
      $interno=$usuario->interno;

      $codigo=$solicitud->cod_form_pres;
      $cantidad=$solicitud->cantidad;
      $meses=$solicitud->meses;
      $porcentaje=$solicitud->porcentaje;
      $cheque=$solicitud->numero_cheque;
      $fecha=$solicitud->fecha;

      $garante=ClaseUsuario::encontrar_por_id($solicitud->idGarante);
      $ci_ga=$garante->ci;
      $nombre_ga=$garante->nombre;
      $nombre2_ga= $garante->nombre2;
      $apellido_p_ga= $garante->apellido_p;
      $apellido_m_ga=$garante->apellido_m;

      $ganancias=ClaseHistorial::historial_por_ci($ci);
      $cantidad_sueldo= $ganancias->cantidad_sueldo;
      $liquido=$ganancias->liquido;
      $monto_aporte= $ganancias->monto_aporte;
      


$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetMargins(30,10,25,50);

// ---------------------------------------------------------
// set margins
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);// add a page
$pdf->AddPage();
$image_file = K_PATH_IMAGES.'alpha.png';


$pdf->SetFont('helvetica', '', 10);


// set default header data
$htmlcontent = '
<style>
table, tr, td {
    border: 1px solid black;
    border-collapse: collapse;
}
table, tr, td {
    padding: 5px;
}
</style>
            <h2 style="text-align: right;">&nbsp;FORMULARIO "A"</h2>
            <h2 style="text-align: center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FONDO DE AHORRO Y CREDITO "SAN PABLO"</h2>
            <h1 style="text-align: center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SOLICITUD PRESTAMO<br><br></h1>
  <table style="width:100%;">
  <tr>
    <td colspan="3">Solicitud Nº: '.$codigo.'</td>
    <td >Fecha: '.$fechaform = date("d-m-Y", strtotime($fecha)).'</td>
  </tr>
  <tr>
    <td>CI: '.$ci.'</td>
  </tr>
  <tr>
    <td colspan="4">Nombres y Apellidos: &nbsp; '.$nombre.' '.$nombre2.' '.$apellido_p.' '.$apellido_m.'</td>
  </tr>
  <tr>
    <td style="width:330px;">Dirección: &nbsp; '.$direccion.'</td>
    <td style="width:150px;" >Nº de Celular: '.$celular.'</td>
  </tr>
  <tr>
    <td style="width:330px;">Departamento UCB:&nbsp; '.$departamento.'</td>
    <td style="width:150px;" >Interno: &nbsp; '.$interno.'</td>
  </tr>
  <tr>
    <td colspan="4">Correo Electrónico: &nbsp; '.$correos.'</td>
  </tr>
  <tr>
    <td colspan="4">Señores del Comité de Crédito:</td>
  </tr>
  <tr>
    <td style="width:330px;">Presento a Uds. mi solicitud de préstamo por la cantidad de '.$cantidad.' Bs</td>
  </tr>
  <tr>
    <td colspan="4">Comprometiéndome a su total cancelación en un plazo de '.$meses.' meses.</td>
  </tr>
  <tr>
    <td colspan="4">a '.$porcentaje.' , mas el interés del 1% sobre saldo.</td>
  </tr>
  <tr>
    <td colspan="4">También me comprometo a seguir aportando la cantidad de Bs '.$monto_aporte.' mensual,</td>
  </tr>
  <tr>
    <td colspan="4">este monto acepté voluntariamente a que se me descuente por planilla.</td>
  </tr>
  <tr>
    <td colspan="4">Ofrezco como garantía personal:</td>
  </tr>
  <tr>
    <td style="width:330px;">Nombre y Apellido: '.$nombre_ga.' '.$nombre2_ga.' '.$apellido_p_ga.' '.$apellido_m_ga.'</td>
    <td style="width:100px;" >CI: '.$ci_ga.'</td>
  </tr>
  <tr>
    <td colspan="4">En caso de incumplimiento de pago, yo garante asumo la totalidad de la deuda contraída.</td>
  </tr>
  <tr>
    <td colspan="4"><strong>Nº de Cheque: '.$cheque.'</strong></td>
  </tr>
  
  <tr>
    <td colspan="2"><p style="text-align: center;"><strong>DATOS ECONÓMICOS DEL SOLICITANTE</strong></p></td>
  </tr>
  <tr>
    <td colspan="2">Total Ganado: '.$cantidad_sueldo.'</td>
  </tr>
  <tr>
    <td colspan="2">Liquido pagable: '.$liquido.'</td>
  </tr>
  <br><br><br><br><br>
  <tr>
    <td style="width:200px;"><div style="text-align: center;"><strong style="text-decoration: overline;">FIRMA DEL SOLICITANTE</strong><br>'.$nombre_ga.' '.$nombre2_ga.' '.$apellido_p_ga.' '.$apellido_m_ga.'<br>CI:'.$ci.'</div></td>
    <td style="width:200px;"><div style="text-align: center;"><strong style="text-decoration: overline;">FIRMA DEL SOLICITANTE</strong><br>'.$nombre_ga.' '.$nombre2_ga.' '.$apellido_p_ga.' '.$apellido_m_ga.'<br>CI: '.$ci_ga.'</div></td>
  </tr>
  <br><br><br><br><br>
  <tr>
    <td style="width:200px; text-decoration: overline;"><p style="text-align: center;"><strong>PDTE. COMITÉ ADMINISTRATIVO</strong></p></td>
    <td style="width:200px; text-decoration: overline;"><p style="text-align: center;"><strong>PDTE. COMITÉ DE CRÉDITO</strong></p></td>
  </tr>
  </table>



'; 

$w = 30;
$h = 30;
// Example of Image from data stream ('PHP rules')
$ser='images/logo_form.jpg';
$pdf->Image($ser, 20, 17, $w, $h, 'JPG', '', '', false, 300, '', false, false, 0, 0, false, false);
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