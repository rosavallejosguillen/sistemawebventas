<?php 
require_once('../vendor/autoload.php');
require_once('../modelo/reporte.php');

$mensaje='con_fecha';
$mpdf = new \Mpdf\Mpdf();
$css=file_get_contents("../css/pdf.css");
$mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
if ($mensaje=='con_fecha') {
	$fecha_inicial=$_POST['fecha_ini'];
	$fecha_final=$_POST['fecha_fin'];
	$mpdf->WriteHTML(getHTML($fecha_inicial,$fecha_final),\Mpdf\HTMLParserMode::HTML_BODY);
	$mpdf->Output("../pdf/pdf-reporte/pdf-".$fecha_inicial.".pdf","F");
}
 ?>