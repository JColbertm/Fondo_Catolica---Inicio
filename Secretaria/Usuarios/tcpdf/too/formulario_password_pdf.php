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
$pdf->setPrintFooter(false);
$pdf->setPrintHeader(false);

$pdf->AddPage();
$image_file = K_PATH_IMAGES.'alpha.png';


$pdf->SetFont('helvetica', '', 11);

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
<th rowspan="2" colspan="3" align="center"><h2>PASSWORD AUTOGENERADO</h2></th>
</tr>

<tr><th colspan="4"></th></tr>
<tr><th colspan="4"></th></tr>

</thead>
<tbody >
<tr >
<td colspan="4"><b>Fecha:   </b>'.date('Y-m-d').'</td>
</tr>

<tr>
<td colspan="3"><b>Nombre(s) y Apellido(s):   </b>'.$nom.' '.$ap.'</td>
</tr><tr>
<td colspan="3"><b>Carnet de identidad: </b>'.$ci.'</td>
</tr>




<tr>
<td colspan="2" ><b>Usuario:  </b> '.$user.'</td>
<td colspan="2"><b>Nuevo Password:  </b> '.$pass.'</td>
</tr>

<tr><td colspan="4"></td></tr>

<tr>
<td colspan="4" ><b>    NOTA:</b> </td>
</tr>

<tr>
<td colspan="4" style="background-color:#dedede;">    Es recomendable cambiar su contraseña al momento de ingresar por primera vez a su cuenta<br>    en el sistema por motivos de seguridad.</td>
</tr>









</tbody>

</table>

';

//$htmlcontent='';
$w = 35;
$h = 35;

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