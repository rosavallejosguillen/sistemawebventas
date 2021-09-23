<?php 
include_once 'Conexion.php';

class Cliente{
	var $objetos;	
	public function __construct()
	{
		$db=new Conexion();
		$this->acceso = $db->pdo;
	}
	function crear_cliente($nombre,$apellido,$dni){
		$sql="SELECT id_cliente FROM cliente where dni_client=:dni";
		$query=$this->acceso->prepare($sql);
		$query->execute(array(':dni'=>$dni));
		$this->objetos=$query->fetchall();
		if (!empty($this->objetos)) {
			echo 'noadd';
		}
		else{
			$sql="INSERT INTO cliente(nombre_client,apellido_client,dni_client) VALUES(:nombre,:apellido,:dni)";
			$query=$this->acceso->prepare($sql);
			$query->execute(array(':nombre'=>$nombre,':apellido'=>$apellido,':dni'=>$dni));
			echo 'add';
		}
	}
	function buscar(){
		if (!empty($_POST['consulta'])) {
			$consulta=$_POST['consulta'];
			$sql="SELECT * FROM cliente where dni_client LIKE :consulta or nombre_client LIKE :consulta or apellido_client LIKE :consulta";
			$query=$this->acceso->prepare($sql);
			$query->execute(array(':consulta'=>"%$consulta%"));
			$this->objetos=$query->fetchall();
			return $this->objetos;
		}
		else{			
			$sql="SELECT * FROM cliente where estado=1 and nombre_client NOT LIKE '' ORDER BY id_cliente LIMIT 5";
			$query=$this->acceso->prepare($sql);
			$query->execute();
			$this->objetos=$query->fetchall();
			return $this->objetos;
		}
	}
function editar($id_editado,$nombre,$apellido,$dni){
		$sql="UPDATE cliente SET nombre_client=:nombre,apellido_client=:apellido,dni_client=:dni where id_cliente=:id";
		$query=$this->acceso->prepare($sql);
		$query->execute(array(':id'=>$id_editado,':nombre'=>$nombre,':apellido'=>$apellido,'dni'=>$dni));	
		echo 'edit';
	}

function borrar($id){
		$sql="UPDATE cliente SET estado=0 where id_cliente=:id";
		$query=$this->acceso->prepare($sql);
		$query->execute(array(':id'=>$id));		
		if (!empty($query->execute(array(':id'=>$id)))) {
			echo 'borrado';
		}
		else{
			echo 'noborrado';
		}
	}

function obtener_datos($id){
		$sql="SELECT *FROM cliente where id_cliente=:id";
		$query = $this->acceso->prepare($sql);
		$query->execute(array(':id'=>$id));
		$this->objetos=$query->fetchall();
		return $this->objetos;
	}
	/*function obtener_datos($id){
		$sql="SELECT id_cliente,concat(nombre_client,' ',apellido_client) as nombre,estado FROM cliente where id_cliente=:id";
		$query = $this->acceso->prepare($sql);
		$query->execute(array(':id'=>$id));
		$this->objetos=$query->fetchall();
		return $this->objetos;
	}*/

	
}

 ?>