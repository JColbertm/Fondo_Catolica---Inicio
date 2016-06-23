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
			$c=0;
			$prestamo=ClasePrestamo::solicitud_por_id($id);
			 $usuario=ClaseUsuario::encontrar_por_id($prestamo->idUsuario);
			 $garante=ClaseUsuario::encontrar_por_id($prestamo->idGarante);
			 		$idPrestamo=$prestamo->idPrestamo;
			 		$cod_form_pres=$prestamo->cod_form_pres;
			 		$estado=$prestamo->estado;
			 		$cuota_pres=$prestamo->cuota_pres;
			 		$porcentaje=$prestamo->porcentaje;
			 		$cantidad=$prestamo->cantidad;
			 		$meses_pre=$prestamo->meses;
			 		$fecha=$prestamo->fecha;
			 		$ci= $usuario->ci;
				 	$nombre=$usuario->nombre;
				 	$nombre2= $usuario->nombre2;
				 	$apellido_p= $usuario->apellido_p;
				 	$apellido_m=$usuario->apellido_m;
				 	$ci_ga= $garante->ci;
				 	$nombre_ga=$garante->nombre;
				 	$nombre2_ga= $garante->nombre2;
				 	$apellido_p_ga= $garante->apellido_p;
				 	$apellido_m_ga=$garante->apellido_m;
				 
			      $dia = date("d", strtotime($fecha));
			      $mes = date("m", strtotime($fecha));
			      $ano = date("Y", strtotime($fecha));
			      $meses = array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiempre","Octubre","Noviembre","Diciembre");
$mese=(string)(int)$mes;
$cuota=1;    

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetMargins(20,10,25,50);

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
.negrita td{
	font-weight: bold;
	font-size: 10px;
}
.titulo{
	background-color: lightgray;
}
.letra{
    font-size: 9.5px;
}
</style>

<table >
	<tr>
	<td colspan="7"><strong>N°:</strong>'.$cod_form_pres.'</td></tr>
	<tr>
	<td colspan="7"><strong>Garante:</strong>'.$nombre_ga.' '.$nombre2_ga.' '.$apellido_p_ga.' '.$apellido_m_ga.' </td>
	</tr>
	<tr>
	<td colspan="7"><strong>CI:</strong>'.$ci_ga.'</td>
	</tr>
	<tr class="titulo">
	<td colspan="6" ><h2 align="center" >PRÉSTAMO NUEVO</h2></td>
	</tr>
	<tr>
	<td colspan="6"><h4 align="center">SOCIO: '.$nombre.' '.$nombre2.' '.$apellido_p.' '.$apellido_m.'</h4></td>
	</tr>
	<tr>
	<td colspan="6"><h4 align="center">CI:'.$ci.'</h4></td>
	</tr>
	<tr>
	<td colspan="6"><p align="center">Préstamo realizado el '.$dia.' de '.$meses[$mese].' de '.$ano.' </p></td>
	</tr>
<br>
<tr class="negrita titulo" >
<td align="center">Monto<br>Capital Bs<br>'.$cantidad.'</td>
<td></td>
<td align="center">Tasa de<br>interés<br>'.$porcentaje.'  %</td>
<td align="center">Periodo de la<br>cuota en<br>meses<br> 12</td>
<td align="center">Tasa<br>periodica<br>1,00%</td>
<td align="center">N° de<br>cuotas<br>'.$meses_pre.' </td>

</tr>
<br>
<tr class="negrita">
<td align="center">N° de<br>Cuotas</td>
<td align="center">Mes</td>
<td align="center">Capital al<br>inicio del<br>periodo</td>
<td align="center">Amortizacion</td>
<td align="center">Intereses de<br>periodo</td>
<td align="center">Cuota</td>
</tr>
</table>
'; 
$amorti=0;
$cant=$cantidad;
$pago_to=$meses_pre;
$total_inte=0;
$total_cuotas=0;
for ($i=0; $i < $meses_pre; $i++) { 
$mes_pre=$meses[$mese];
if($mese==12){$mes_pre=$mes_pre.' '.$ano++;$mese=0;}
if($mese==1){$mes_pre=$mes_pre.' '.$ano;}
$monto=round($cant-$amorti, 2);
$inter=round($monto*0.01, 2);
$amorti=round($cuota_pres-$inter, 2);
if($i<5){
$htmlcontent.='
<table >
<tr class="letra">
<td align="center">'.$cuota.'</td>
<td >'.$mes_pre.'</td>
<td align="center">'.$monto.'</td>
<td align="center">'.$amorti.'</td>
<td align="center">'.$inter.'</td>
<td align="center">'.$cuota_pres.'</td>
<td ></td>
</tr>
</table>
';}else{
	$mul=$pago_to-$i;
$htmlcontent.='
<table >
<tr class="letra">
<td align="center">'.$cuota.'</td>
<td >'.$mes_pre.'</td>
<td align="center">'.$monto.'</td>
<td align="center">'.$amorti.'</td>
<td align="center">'.$inter.'</td>
<td align="center">'.$cuota_pres.'</td>
<td align="center">'.$cuota_pres*$mul.'</td>
</tr>
</table>
';}
$cant=$monto;
$cuota++;
$mese++;
$total_inte=$total_inte+$inter;
$total_cuotas=$total_cuotas+$cuota_pres;
}
$htmlcontent.='
<table>

<tr>
<br>

<td align="center"></td>
<td ></td>
<td align="center"><strong>Totales</strong></td>
<td align="center">'.$cantidad.'</td>
<td align="center">'.$total_inte.'</td>
<td align="center">'.$total_cuotas.'</td>
<td ></td>
</tr>
</table>
';
// Example of Image from data stream ('PHP rules')
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