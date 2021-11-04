<?php 
include_once '../modelo/Cliente.php';
	$cliente=new Cliente();	
if ($_POST['funcion']=='crear_cliente') {
		$nombre=$_POST['nombre_cliente'];
		$apellido=$_POST['apellido_cliente'];		
		$dni=$_POST['dni_cliente'];		
		$cliente->crear_cliente($nombre,$apellido,$dni);
	}
if ($_POST['funcion']=='buscar') {	
	$cliente->buscar();
	$json=array();
	foreach ($cliente->objetos as $objeto) {
		$json[]=array(
			'id'=>$objeto->id_cliente,
			'nombre'=>$objeto->nombre_client,
			'apellido'=>$objeto->apellido_client,
			'dni'=>$objeto->dni_client			
		);
	}
	$jsonstring=json_encode($json);
	echo $jsonstring;
}
if ($_POST['funcion']=='editar') {	
	$id_editado=$_POST['id_editado'];
	$nombre=$_POST['nombre_cliente'];
	$apellido=$_POST['apellido_cliente'];
	$dni=$_POST['dni_cliente'];
	$cliente->editar($id_editado,$nombre,$apellido,$dni);
}
if ($_POST['funcion']=='borrar'){
	$id=$_POST['id'];
	$cliente->borrar($id);
}
if ($_POST['funcion']=='capturar_datos') {
		$json=array();
		$id=$_POST['id'];
		$cliente->obtener_datos($id);
		foreach ($cliente->objetos as $objeto) {			
			$json[]=array(				
				'nombre'=>$objeto->nombre_client.' '.$objeto->apellido_client,
				//'apellido'=>$objeto->apellido_client,
				'dni'=>$objeto->dni_client,		
			);		
		}
		$jsonstring=json_encode($json[0]);
		echo $jsonstring;		
	}

 ?>