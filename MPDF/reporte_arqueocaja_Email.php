<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';


require_once __DIR__ . '/vendor/autoload.php';
require '../conexion_reportes/r_conexion.php';
//require 'numeroletras/CifrasEnLetras.php';
//Incluímos la clase pago
//$v=new CifrasEnLetras(); 
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [80, 180]]);
$query = "SELECT caja.caja_id, 
				caja.caja_descripcion, 
				caja.caja_monto_inicial, 
				caja.caja_monto_ingreso,
				caja.caja__monto_egreso, 
				DATE_FORMAT(caja.caja_f_apertura, '%d/%m/%Y') as caja_f_apertura,
				DATE_FORMAT(caja.caja_f_cierre, '%d/%m/%Y') as caja_f_cierre, 
				caja.caja_count_ingreso, 
				caja.caja_count_egreso, 
				caja.caja_monto_total, 
				caja.caja_hora_apertura, 
				caja.caja_estado, 
				caja.caja_hora_cierre, 
				empresa.razon_social,
				empresa.email,
				empresa.moneda,
				(SELECT  IFNULL(SUM(total_venta),0) from venta_cabecera where  f_pago = 'Efectivo' and venta_estado = 'REGISTRADA' and caja_id =  '".$_GET['codigo']."' ) as efectivo,
				(SELECT  IFNULL(SUM(total_venta),0) from venta_cabecera where  f_pago = 'Yape' and venta_estado = 'REGISTRADA' and caja_id =  '".$_GET['codigo']."') as yape,
				(SELECT  IFNULL(SUM(total_venta),0) from venta_cabecera where  f_pago = 'Plin' and venta_estado = 'REGISTRADA' and caja_id =  '".$_GET['codigo']."') as plin,
				(SELECT  IFNULL(SUM(total_venta),0) from venta_cabecera where  f_pago = 'Transferencia' and venta_estado = 'REGISTRADA' and caja_id =  '".$_GET['codigo']."') as transfe,
				(SELECT  IFNULL(SUM(monto_transfe),0) from venta_cabecera where  f_pago = 'efecytrans' and venta_estado = 'REGISTRADA' and caja_id =  '".$_GET['codigo']."') as tarjet,
				(SELECT  IFNULL(SUM(monto_efectivo),0) from venta_cabecera where  f_pago = 'efecytrans' and venta_estado = 'REGISTRADA' and caja_id =  '".$_GET['codigo']."') as efect_y_tarj,
				(SELECT  IFNULL(SUM(monto),0) from venta_credito where   caja_estado = 'CERRADO' and caja_id =  '".$_GET['codigo']."' ) as abonos,
				caja_monto_ing_directo,
				caja_monto_egre_directo,
				(caja_monto_ingreso + caja_monto_ing_directo + caja_abonos) as sum_mi_id,
				( caja.caja_monto_egre_directo) as sum_me_ed
				 
				FROM
				caja,
				empresa
				WHERE caja.caja_id =   '".$_GET['codigo']."'";
	
$estado = "";

	$resultado = $mysqli ->query($query);
while ($row1 = $resultado-> fetch_assoc()){
	$estado = $row1['caja_estado'];
	$correoEmpresa = $row1['email'];
	$razon = $row1['razon_social'];


	//para ver el logo en la i,presion
	//<h3 style="text-align:center;display: inline-block;margin: 0px;padding: 0px; "><img src="../'.$row1['config_foto'].'" width="45px"></h3><br>

$html.='
<style>
		@page {
		margin: 4mm;
		margin-header: 0mm;
		margin-footer: 0mm;
		odd-footer-name: html_myfooter1;
		}

</style>	
	<h5 style="text-align:center;display: inline-block;margin: 0px;padding: 0px; ">'.$row1['razon_social'].'</h5><br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Arqueo de Caja<br>
	-------------------------------------------------------------<br>
	
	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-size:11px">Ticket N.:&nbsp; 000'.$row1['caja_id'].'&nbsp;</h6>
	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;">Apertura&nbsp;:&nbsp; '.$row1['caja_f_apertura'].' - '.$row1['caja_hora_apertura'].'</h6>
	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;">Cierre&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp; '.$row1['caja_f_cierre'].' - '.$row1['caja_hora_cierre'].'</h6>
	
		 
	<h5 style="display: inline-block;margin: 3px;padding: 3px; font-weight:normal;">------------------------- Detalle Venta -----------------------</h5>
	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;"> &nbsp;&nbsp;- Efectivo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;'.$row1['moneda'].'. '.round(($row1['efectivo'] + $row1['efect_y_tarj']), 2).'</h6> 
	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;"> &nbsp;&nbsp;- Yape&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;'.$row1['moneda'].'. '.$row1['yape'].'</h6> 
	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;"> &nbsp;&nbsp;- Plin&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;'.$row1['moneda'].'. '.$row1['plin'].'</h6> 
	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;"> &nbsp;&nbsp;- Trasferencia&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;'.$row1['moneda'].'.  '.round(($row1['transfe'] + $row1['tarjet']), 2).'</h6> 
	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;"> &nbsp;&nbsp;- Credito&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;'.$row1['moneda'].'. '.$row1['abonos'].'</h6> 
	<h5 style="display: inline-block;margin: 3px;padding: 3px; font-weight:normal;">------------------------ Detalle General --------------------</h5>


	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;"> <b>Monto Inicial&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;'.$row1['moneda'].'. '.$row1['caja_monto_inicial'].' <b></h6> 
	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;"> Ingresos (v+i+a) &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;'.$row1['moneda'].'.  '.$row1['caja_monto_ingreso'].' +  '.$row1['caja_monto_ing_directo'].' + '.$row1['abonos'].'</h6>
	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;"> Gastos&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;'.$row1['moneda'].'.  '.$row1['caja_monto_egre_directo'].' </h6>
	<h5 style="display: inline-block;margin: 3px;padding: 3px; font-weight:normal;">------------------ Detalle Cuadre Final -------------------</h5>


	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;"> <b>Ingresos Totales&nbsp;&nbsp;&nbsp;:</b> &nbsp;&nbsp;'.$row1['moneda'].'.  '.round(($row1['caja_monto_ingreso'] + $row1['caja_monto_ing_directo'] + $row1['abonos'] ), 5).' </h6>
	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;"> <b>Egresos Totales&nbsp;&nbsp;&nbsp; :</b> &nbsp;&nbsp;'.$row1['moneda'].'.  '.round(( $row1['caja_monto_egre_directo'] ), 5).' </h6>
	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;"> <b>Saldo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b> &nbsp;&nbsp;'.$row1['moneda'].'.  '.round(($row1['sum_mi_id'] - $row1['sum_me_ed'] ), 5).'</h6>
	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;"> <b>Monto Inicial + Saldo&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;'.$row1['moneda'].'.  '.$row1['caja_monto_total'].' </b></h6>
	
	-------------------------------------------------------------<br>
	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-size:11px;">Total en Caja&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;'.$row1['moneda'].'.  '.round(($row1['caja_monto_inicial'] + $row1['efectivo'] +  $row1['efect_y_tarj'] +  $row1['caja_monto_ing_directo'] +  $row1['abonos'] - $row1['sum_me_ed']), 5).' </h6>
	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-size:11px">Total Cta Bancaria&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;'.$row1['moneda'].'. '.round(($row1['yape'] + $row1['plin'] + $row1['transfe']  + $row1['tarjet'] ), 5).' </h6>
	<h6 style="display: inline-block;margin: 0px;padding: 0px;  font-size:11px">Total Cuadre&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;'.$row1['moneda'].'.  '.$row1['caja_monto_total'].' </h6>
	-------------------------------------------------------------<br>
	<h6 style="display: inline-block;margin: 0px;padding: 0px; font-weight:normal;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GRACIAS POR SU PREFERENCIA</h6>
	-------------------------------------------------------------<br>
	';



}


$mpdf->WriteHTML(utf8_encode($html));
//$file='pdf_caja/'.time().'.pdf';
$caja = $estado; //abierto - cerrado
$correo = $correoEmpresa; // correo de la empresa
$nom_empresa= $razon;
$pdf = $mpdf->Output("", 'S');
$mpdf->Output();
//D: ABRIR EXPLORA DE ARCHIVOS PARA GUARDAR
//F: GUARDAR EN RUTA MPDF $mpdf->Output($file, 'F');
sendEmail($pdf, $correo,$nom_empresa);

function sendEmail($pdf, $correo,$nom_empresa)
{
	$mail = new PHPMailer(true);

	try {
		$mail = new PHPMailer();
		//Server settings
		$mail->isSMTP();                                            //Send using SMTP
		$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
		$mail->SMTPAuth   = true;
		//Enable SMTP authentication
		$mail->Username   = $correo;                     //SMTP username
		$mail->Password   = 'nfawbmfgxyfbuacv';                               //SMTP password
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
		$mail->Port       = 587;                                    //TCP port to connect to; use 587 - ssl 465 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

		//Recipients
		$mail->setFrom($correo, $nom_empresa); //DE:
		$mail->addAddress($correo, 'Correo Developer'); //PARA:
		$mail->addStringAttachment($pdf, "attachment.pdf"); //ARCHIVO PDF

		$mail->isHTML(true);                                  //Set email format to HTML
		$mail->Subject = 'Documento PDF de Cierre de Caja ';


		$mail->Body    = 'Este es el Documento Pdf del Cierre de Caja - ' + $nom_empresa;
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		$mail->send();
		echo 'Correo Enviado';
	} catch (Exception $e) {
		echo "Error al enviar el correo: {$mail->ErrorInfo}";
	}
}
