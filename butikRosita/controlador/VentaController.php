<?php 
include '../modelo/Venta.php';
$venta=new Venta();
if ($_POST['funcion']=='listar') {
	$venta->buscar();
	$json=array();
	foreach ($venta->objetos as $objeto) {
		$json['data'][]=$objeto;
	}
	$jsonstring=json_encode($json);
	echo $jsonstring;
}
if ($_POST['funcion']=='venta_mes') {
	$venta->venta_mes();
	$json=array();
	foreach ($venta->objetos as $objeto) {
		$json[]=$objeto;
	}
	$jsonstring=json_encode($json);
	echo $jsonstring;
}
if ($_POST['funcion']=='producto_mas_vendido') {
	$venta->producto_mas_vendido();
	$json=array();
	foreach ($venta->objetos as $objeto) {
		$json[]=$objeto;
	}
	$jsonstring=json_encode($json);
	echo $jsonstring;
}

if ($_POST['funcion']=='ultimo_id') {
	$venta->ultimo_id();
	$json=array();
	foreach ($venta->objetos as $objeto) {
		$json[]=array(
			'id'=>$objeto->id,
		);
	}
	$jsonstring=json_encode($json);
	echo $jsonstring;
}

if ($_POST['funcion']=='reporte1') {
	$fecha_inicial=$_POST['fecha_ini'];
	$fecha_final=$_POST['fecha_fin'];
	$venta->reporte1($fecha_inicial,$fecha_final);	
	$json=array();
	foreach ($venta->objetos as $objeto) {
		$json['data'][]=$objeto;
	}
	$jsonstring=json_encode($json);
	echo $jsonstring;
}
if ($_POST['funcion']=='reporte_producto') {	
	$fecha_inicial=$_POST['fecha_ini'];
	$fecha_final=$_POST['fecha_fin'];
	$nombre_producto=$_POST['nombre_producto'];
	$venta->reporte_producto($nombre_producto,$fecha_inicial,$fecha_final);
	$json=array();
	foreach ($venta->objetos as $objeto) {
		$json['data'][]=$objeto;
	}
	$jsonstring=json_encode($json);
	echo $jsonstring;
}
if ($_POST['funcion']=='rellenar_productos'){	
	$venta->rellenar_productos();
	$json =array();
	foreach ($venta->objetos as $objeto) {
		$json[]=array(
			'id'=>$objeto->id_producto,
			'nombre'=>$objeto->nombre
		);

	}
	$jsonstring=json_encode($json);
	echo $jsonstring;
}

 ?>