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

     $use=ClaseUsuario::encontrar_por_id($idu);
      $ci=$use->ci;
      $nomb=$use->nombre;
      $nomb2=$use->nombre2;
      $ap=$use->apellido_p;
      $ap2=$use->apellido_m;
      $user=$use->nombre_usuario;
      $pass=$use->password;
      $direccion=$use->direccion;
      $telefono=$use->telefono;
      $celular=$use->celular;
      $departamento=$use->departamento;
      $correo=$use->correos;
      $interno=$use->interno;
      $institucion=$use->institucion;

      $use_h=ClaseHistorial::encontrar_por_id($idu);
      $cantidad_sueldo=$use_h->cantidad_sueldo;
      $monto_aporte=$use_h->monto_aporte;
      $mes=$use_h->idMes;
      $liquido=$use_h->liquido;
      $antiguedad=$use_h->antiguedad;

      $use_i=ClaseAfiliacion::encontrar_por_id($idu);
      $idafi=$use_i->idAfiliacion;
      $fecha=$use_i->fecha;

      $a = explode('-',$fecha);
      $my_new_date = $a[2].'-'.$a[1].'-'.$a[0];

      $mes_nombre='';

      if($mes==1){$mes_nombre="Enero";}
      if($mes==2){$mes_nombre="Febrero";}
      if($mes==3){$mes_nombre="Marzo";}
      if($mes==4){$mes_nombre="Abril";}
      if($mes==5){$mes_nombre="Mayo";}
      if($mes==6){$mes_nombre="Junio";}
      if($mes==7){$mes_nombre="Julio";}
      if($mes==8){$mes_nombre="Agosto";}
      if($mes==9){$mes_nombre="Septiembre";}
      if($mes==10){$mes_nombre="Octubre";}
      if($mes==11){$mes_nombre="Noviembre";}
      if($mes==12){$mes_nombre="Diciembre";}

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


<tr><th rowspan="4" colspan="1"></th></tr>

<tr><th colspan="3" align="right"><h2>Formulario "H"</h2></th></tr>
<tr><th colspan="3"></th></tr>
<tr><th rowspan="2" colspan="3" align="center"><h2>FONDO DE AHORRO Y CREDITO "SAN PABLO"</h2><h1>SOLICITUD PARA AFILIACION</h1></th></tr>


<tr><th colspan="4"></th></tr>
<tr><th colspan="4"></th></tr>

</thead>

<tbody >
<tr>
<td colspan="2"><b>Solicitud Nro:   </b>SA-'.$idafi.'</td>
<td colspan="2"><b>Fecha:    </b> '.$my_new_date.'</td>
</tr>


<tr>
<td colspan="4" ><b>Carnet de identidad:</b>   '.$ci.'</td>
</tr>


<tr>
<td colspan="4" ><b>Nombre(s) y apellido(s): </b>   '.$nomb.' '.$nomb2.' '.$ap.' '.$ap2.'</td>
</tr>

<tr>
<td colspan="4" ><b>Direccion:</b>   '.$direccion.'</td>
</tr>

<tr>
<td colspan="2" ><b>Nro. Telefono:</b>   '.$telefono.'</td>
<td colspan="2" ><b>Nro. Celular: </b>   '.$celular.'</td>
</tr>

<tr>
<td colspan="4" ><b>Institucion: </b>   '.$institucion.'</td>
</tr>

<tr>
<td colspan="2" ><b>Departamento: </b>   '.$departamento.'</td>
<td colspan="2" ><b>Interno: </b>   '.$interno.'</td>
</tr>

<tr>
<td colspan="4" ><b>Correo:</b>  '.$correo.'</td>
</tr>



<tr><td colspan="4"></td></tr>

<tr>
<td colspan="4" >Señores de la Directiva:</td>
</tr>

<tr>
<td colspan="4" >Presento a Uds. el detalle de mi boleta de pago:</td>
</tr>

<tr>
<td colspan="4"><b>Total ganado: </b>   '.$cantidad_sueldo.' Bs.</td>
</tr>

<tr>
<td colspan="4"><b>Liquido pagable: </b>    '.$liquido.' Bs.</td>
</tr>

<tr>
<td colspan="4" >Antigüedad como personal administrativo:    '.$antiguedad.'</td>
</tr>

<tr>
<td colspan="4" >Los aportes seran unicamente por descuento en planilla de haberes mensuales segun art.24:</td>
</tr>

<tr>
<td colspan="4" >El monto que deseo aportar mensualmente es de Bs:  '.$monto_aporte.'</td>
</tr>

<tr>
<td colspan="4" >A partir del mes de:  '.$mes_nombre.'</td>
</tr>

<tr><td colspan="4"></td></tr>
<tr><td colspan="4"></td></tr>
<tr><td colspan="4"></td></tr>
<tr><td colspan="4"></td></tr>

<tr><td colspan="2" align="center" class="negrita">   PDTE. COMITÉ ADMINISTRATIVO </td>
<td colspan="2" align="center" class="negrita">   FIRMA DEL SOLICITANTE </td></tr>

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