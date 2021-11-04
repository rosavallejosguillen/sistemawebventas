<?php 
require_once('../vendor/autoload.php');
require_once('../modelo/reporteProducto.php');
$mpdf = new \Mpdf\Mpdf();
$css=file_get_contents("../css/pdf.css");
$fecha_inicial=$_POST['fecha_ini'];
$fecha_final=$_POST['fecha_fin'];
$nombre_producto=$_POST['nombre_producto'];
$mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML(getHTML($nombre_producto,$fecha_inicial,$fecha_final),\Mpdf\HTMLParserMode::HTML_BODY);
$mpdf->Output("../pdf/pdf-reporteProducto/pdf-".$nombre_producto.".pdf","F");	

 ?>