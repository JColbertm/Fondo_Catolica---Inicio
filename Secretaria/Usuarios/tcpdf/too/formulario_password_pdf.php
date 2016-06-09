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
		include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/gral_php/databaseA.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/Fondo_Catolica/clases/claseUsuario.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/Fondo_Catolica/clases/claseAfiliacion.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/Fondo_Catolica/clases/claseHistorial.php";
  
// get data from users table

    $idu = filter_var($_GET['idu'],FILTER_SANITIZE_NUMBER_INT);

    $res= ClaseUsuario::genera_password($idu);  
    
  
      $ci=$res['ci'];
      $nom=$res['nombre'];
      $ap=$res['apellido'];
      $pass= filter_var($_GET['pass'],FILTER_SANITIZE_STRING);
      $original=$res['original'];
      $user=$res['user'];
      $fecha=$res['fecha_afi'];
     
      /////////////////

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// ---------------------------------------------------------
// set margins
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
// add a page
$pdf->AddPage();
$image_file = K_PATH_IMAGES.'alpha.png';


$pdf->SetFont('helvetica', '', 10);

$htmlcontent='

<style>


table {
  border-collapse: collapse;
  padding-top:5px;
  padding-bottom:3px;
  padding-right:20px;
  padding-left:30px;

}

.negrita{
  padding: 0 50px 0 50px;
  font-weight: bold;
}

</style>

<table>
<thead>

<tr><th colspan="4"></th></tr>
<tr><th colspan="4"></th></tr>
<tr><th colspan="4"></th></tr>
<tr><th colspan="4"></th></tr>
<tr>
<th rowspan="2" colspan="1"></th>
<th rowspan="2" colspan="3" align="center"><h2>CAMBIO DE PASSWORD</h2></th>
</tr>

<tr><th colspan="4"></th></tr>
<tr><th colspan="4"></th></tr>

</thead>
<tbody class="margen">

<tr class="negrita">
<td colspan="4">Nombre y Apellido</td>
</tr>
<tr>
<td colspan="4">                '.$nom.' '.$ap.'</td>
</tr>

<tr>
<td colspan="4" class="negrita">Carnet</td></tr>
<tr>
<td colspan="4">                '.$ci.'</td>
</tr>


<tr class="negrita">
<td colspan="2">Fecha</td>
</tr>
<tr>
<td colspan="2">                '.$fecha.'</td>
</tr>

<tr>
<td colspan="4" class="negrita">Usuario</td></tr>
<tr>
<td colspan="4">                '.$user.'</td>
</tr>

<tr>
<td colspan="4" class="negrita">Antiguo Password</td>
</tr>
<tr>
<td colspan="4">                '.$original.'</td>
</tr>

<tr>
<td colspan="4" class="negrita">Nuevo Password</td>
</tr>
<tr>
<td colspan="4">                '.$pass.'</td>
</tr>

</tbody>

</table>

';

//$htmlcontent='';
$w = 40;
$h = 40;
// Example of Image from data stream ('PHP rules')
$ser='images/logo_form.png';
$pdf->Image($ser, 20, 11, $w, $h, 'PNG', '', '', false, 300, '', false, false, 0, 0, false, false);
//$image_mask = $pdf->Image("images/image_alpha.png", 50, 50, 100, '', '', '', '', false, 300, '', true, false);
//$pdf->Image("images/image.png", 50, 50, 100, '', '', '', '', false, 300, '', false, $image_mask);

$pdf->writeHTML($htmlcontent, true, 0, true, 0);

// reset pointer to the last page
$pdf->lastPage();


// -----------------------------------------------------------------------------
//Close and output PDF document
$pdf->Output('plan_clase.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+