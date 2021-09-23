<?php 
include '../modelo/Empresa.php';
$empresa=new Laboratorio();
if ($_POST['funcion']=='crear') {
	$nombre=$_POST['nombre_laboratorio'];
	$avatar='laboratorio_default.jpg';
	$empresa->crear($nombre,$avatar);
}
if ($_POST['funcion']=='editar') {
	$nombre=$_POST['nombre_laboratorio'];
	$id_editado=$_POST['id_editado'];
	$empresa->editar($nombre,$id_editado);
}
if ($_POST['funcion']=='buscar') {	
	$empresa->buscar();
	$json=array();
	foreach ($empresa->objetos as $objeto) {
		$json[]=array(
			'id'=>$objeto->id_laboratorio,
			'nombre'=>$objeto->nombre,
			'avatar'=>'../img/lab/'.$objeto->avatar
		);
	}
	$jsonstring=json_encode($json);
	echo $jsonstring;
}
if ($_POST['funcion']=='cambiar_logo') {	
	$id=$_POST['id_logo_lab'];
	if (($_FILES['photo']['type']=='image/jpeg')||($_FILES['photo']['type']=='image/png')||($_FILES['photo']['type']=='image/gif')) {
			$nombre=uniqid().'-'.$_FILES['photo']['name'];
			$ruta='../img/lab/'.$nombre;
			move_uploaded_file($_FILES['photo']['tmp_name'],$ruta);
			$empresa->cambiar_logo($id,$nombre);
			foreach ($empresa->objetos as $objeto) {
				if ($objeto->avatar!='laboratorio_default.jpg') {
					unlink('../img/lab/'.$objeto->avatar);
				}				
			}
			$json=array();
			$json[]=array(
				'ruta'=>$ruta,
				'alert'=>'edit'
			);
			$jsonstring=json_encode($json[0]);
			echo $jsonstring;
		}
		else{
			$json=array();
			$json[]=array(				
				'alert'=>'noedit'
			);
			$jsonstring=json_encode($json[0]);
			echo $jsonstring;
		}			
}

if ($_POST['funcion']=='borrar'){
	$id=$_POST['id'];
	$empresa->borrar($id);
}
if ($_POST['funcion']=='rellenar_laboratorios'){	
	$empresa->rellenar_laboratorios();
	$json =array();
	foreach ($empresa->objetos as $objeto) {
		$json[]=array(
			'id'=>$objeto->id_laboratorio,
			'nombre'=>$objeto->nombre
		);

	}
	$jsonstring=json_encode($json);
	echo $jsonstring;
}



 ?>