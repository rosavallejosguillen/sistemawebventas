<?php 
include_once 'Conexion.php';
class Venta{
	var $objetos;
	public function __construct(){
		$db=new Conexion();
		$this->acceso=$db->pdo;
	}
	function Crear($nombre,$dni,$total,$fecha,$vendedor){
		$sql="INSERT INTO venta(fecha,cliente,dni,total,vendedor) values(:fecha,:cliente,:dni,:total,:vendedor)";
		$query=$this->acceso->prepare($sql);
		$query->execute(array(':fecha'=>$fecha,':cliente'=>$nombre,':dni'=>$dni,':total'=>$total,'vendedor'=>$vendedor));
	}
	function ultima_venta(){
		$sql="SELECT MAX(id_venta) as ultima_venta FROM venta";
		$query=$this->acceso->prepare($sql);
		$query->execute();
		$this->objetos=$query->fetchall();
		return $this->objetos;
	}
	function borrar($id_venta){
		$sql="DELETE FROM venta where id_venta=:id_venta";
		$query=$this->acceso->prepare($sql);
		$query->execute(array(':id_venta'=>$id_venta));
	}
	function buscar(){
		$sql="SELECT id_venta,fecha,cliente,dni,total,CONCAT(usuario.nombre_us,' ',usuario.apellidos_us) as vendedor FROM venta inner join usuario on vendedor=id_usuario";
		$query=$this->acceso->prepare($sql);
		$query->execute();
		$this->objetos=$query->fetchall();
		return $this->objetos;
	}
	//buscador de venta pdf
	function buscar_id($id_venta){
		$sql="SELECT id_venta,fecha,cliente,dni,total,CONCAT(usuario.nombre_us,' ',usuario.apellidos_us) as vendedor FROM venta inner join usuario on vendedor=id_usuario and id_venta=:id_venta";
		$query=$this->acceso->prepare($sql);
		$query->execute(array(':id_venta'=>$id_venta));
		
		$this->objetos=$query->fetchall();
		return $this->objetos;
	}
	//consultador de saldo mensual
		function venta_mes(){
		$sql="SELECT sum(total) as cantidad,month(fecha) as mes FROM proyecto.venta where year(fecha)= year (curdate())group by month(fecha)";
		$query=$this->acceso->prepare($sql);
		$query->execute();		
		$this->objetos=$query->fetchall();
		return $this->objetos;
	}
	function producto_mas_vendido(){
		$sql="select nombre,concentracion,adicional, sum(cantidad) as total from venta
		inner join venta_producto on id_venta=venta_id_venta
		inner join producto on id_producto=producto_id_producto
		where year(fecha)=year(curdate()) and month(fecha)=month(curdate()) 
		group by producto_id_producto order by total desc limit 10";
		$query=$this->acceso->prepare($sql);
		$query->execute();		
		$this->objetos=$query->fetchall();
		return $this->objetos;
	}

	function ultimo_id(){		
		$sql="SELECT MAX(id_venta) AS id FROM venta inner join usuario on vendedor=id_usuario";
		$query=$this->acceso->prepare($sql);
		$query->execute();
		$this->objetos=$query->fetchall();
		return $this->objetos;
	}
	function verificar($id_venta,$id_usuario){
		$sql="SELECT * FROM venta WHERE vendedor=:id_usuario and id_venta=:id_venta";
		$query=$this->acceso->prepare($sql);
		$query->execute(array(':id_usuario'=>$id_usuario,':id_venta'=>$id_venta));
		$this->objetos=$query->fetchall();
		if (!empty($this->objetos)) {
			return 1;
		}
		else{
			return 0;
		}
	}
	function recuperar_vendedor($id_venta){
		$sql="SELECT us_tipo FROM venta inner join usuario on id_usuario=vendedor WHERE id_venta=:id_venta";
		$query=$this->acceso->prepare($sql);
		$query->execute(array(':id_venta'=>$id_venta));
		$this->objetos=$query->fetchall();
		return $this->objetos;
	}
	//nueva funcion 10/11/20
	function venta_dia_vendedor($id_usuario){
		$sql="SELECT SUM(total) as venta_dia_vendedor FROM venta WHERE vendedor=:id_usuario and date(fecha)=date(curdate())";
		$query=$this->acceso->prepare($sql);
		$query->execute(array(':id_usuario'=>$id_usuario));
		$this->objetos=$query->fetchall();
		return $this->objetos;
	}
	function venta_diaria(){
		$sql="SELECT SUM(total) as venta_diaria FROM venta WHERE date(fecha)=date(curdate())";
		$query=$this->acceso->prepare($sql);
		$query->execute();
		$this->objetos=$query->fetchall();
		return $this->objetos;
	}
	function venta_mensual(){
		$sql="SELECT SUM(total) as venta_mensual FROM venta WHERE year(fecha)=year(curdate()) and month(fecha)=month(curdate())";
		$query=$this->acceso->prepare($sql);
		$query->execute();
		$this->objetos=$query->fetchall();
		return $this->objetos;
	}
	function venta_anual(){
		$sql="SELECT SUM(total) as venta_anual FROM venta WHERE year(fecha)=year(curdate())";
		$query=$this->acceso->prepare($sql);
		$query->execute();
		$this->objetos=$query->fetchall();
		return $this->objetos;
	}
	/*
	function buscar_id($id_venta){
		$sql="SELECT id_venta,fecha,cliente,dni,total,CONCAT(usuario.nombre_us,' ',usuario.apellidos_us) as vendedor FROM venta inner join usuario on vendedor=id_usuario and id_venta=:id_venta";
		$query=$this->acceso->prepare($sql);
		$query->execute(array(':id_venta'=>$id_venta));
		$this->objetos=$query->fetchall();
		return $this->objetos;
	}*/
	//nuevafuncion Graficar 14/11/2020
	/*function venta_mes(){
		$sql="SELECT sum(total) as cantidad,month(fecha) as mes FROM venta WHERE year(fecha)=year(curdate()) group by month(fecha)";
		$query=$this->acceso->prepare($sql);
		$query->execute();
		$this->objetos=$query->fetchall();
		return $this->objetos;
	}*/
	function vendedor_mes(){
		$sql="SELECT concat(usuario.nombre_us,' ',usuario.apellidos_us) as vendedor_nombre,sum(total) as cantidad FROM venta inner join usuario on id_usuario=vendedor where month(fecha)=month(curdate()) and year(fecha)=year(curdate()) group by vendedor order by cantidad DESC LIMIT 3";
		$query=$this->acceso->prepare($sql);
		$query->execute();
		$this->objetos=$query->fetchall();
		return $this->objetos;
	}
	//nuevaFuncion 15/11/2020
	function ventas_anual(){
		$sql="SELECT sum(total) as cantidad,month(fecha) as mes FROM venta WHERE year(fecha)=year(date_add(curdate(),INTERVAL -1 YEAR)) group by month(fecha)";
		$query=$this->acceso->prepare($sql);
		$query->execute();
		$this->objetos=$query->fetchall();
		return $this->objetos;
	}
	//nuevaFuncion 16/11/2020
	/*function producto_mas_vendido(){
		$sql="SELECT nombre,concentracion,adicional,SUM(cantidad) as total FROM venta INNER JOIN venta_producto on id_venta=venta_id_venta INNER JOIN producto on id_producto=producto_id_producto WHERE year(fecha)=year(curdate()) AND month(fecha)=month(curdate()) GROUP BY producto_id_producto ORDER by total desc LIMIT 4";
		$query=$this->acceso->prepare($sql);
		$query->execute();
		$this->objetos=$query->fetchall();
		return $this->objetos;
	}		*/
	function reporte(){		
				
			$sql="SELECT id_venta,fecha,cliente,dni,total,CONCAT(usuario.nombre_us,' ',usuario.apellidos_us) as vendedor FROM venta inner join usuario on vendedor=id_usuario";
			$query=$this->acceso->prepare($sql);
			$query->execute();
			$this->objetos=$query->fetchall();
			return $this->objetos;			
	}
	function reporte1($fecha_inicial,$fecha_final){		
				
			$sql="SELECT id_venta,fecha,cliente,dni,total,CONCAT(usuario.nombre_us,' ',usuario.apellidos_us) as vendedor FROM venta inner join usuario on vendedor=id_usuario where fecha between :fecha_inicial and :fecha_final";
			$query=$this->acceso->prepare($sql);
			$query->execute(array(':fecha_inicial'=>$fecha_inicial,':fecha_final'=>$fecha_final));
			$this->objetos=$query->fetchall();
			return $this->objetos;			
	}
	function total_fecha($fecha_inicial,$fecha_final){		
				
			$sql="SELECT sum(total) as total_fecha from venta inner join usuario on vendedor=id_usuario where fecha between :fecha_inicial and :fecha_final";
			$query=$this->acceso->prepare($sql);
			$query->execute(array(':fecha_inicial'=>$fecha_inicial,':fecha_final'=>$fecha_final));
			$this->objetos=$query->fetchall();
			return $this->objetos;			
	}

	function reporte_producto($nombre_producto,$fecha_inicial,$fecha_final){
		$sql="SELECT cliente,nombre as medicamento,cantidad,precio,fecha,(precio*cantidad) as subtotal FROM venta
 			INNER JOIN venta_producto on id_venta=venta_id_venta 
 			INNER JOIN producto on id_producto=producto_id_producto 
			 where nombre=:nombre_producto and fecha between :fecha_inicial and :fecha_final";
		$query=$this->acceso->prepare($sql);
		$query->execute(array('nombre_producto'=>$nombre_producto,':fecha_inicial'=>$fecha_inicial,':fecha_final'=>$fecha_final));
		$this->objetos=$query->fetchall();
		return $this->objetos;
	}	
	function reporte_producto1($nombre_producto,$fecha_inicial,$fecha_final){
		$sql="SELECT sum(precio*cantidad) as subtotal FROM venta
 			INNER JOIN venta_producto on id_venta=venta_id_venta 
 			INNER JOIN producto on id_producto=producto_id_producto 
			 where nombre=:nombre_producto and fecha between :fecha_inicial and :fecha_final";
		$query=$this->acceso->prepare($sql);
		$query->execute(array('nombre_producto'=>$nombre_producto,':fecha_inicial'=>$fecha_inicial,':fecha_final'=>$fecha_final));
		$this->objetos=$query->fetchall();
		return $this->objetos;
	}	
	
	

	/*funcio total*/
	function venta_por_producto($nombre_producto,$fecha_inicial,$fecha_final){		
		$sql="SELECT sum(precio*cantidad) as  FROM venta
			 INNER JOIN venta_producto on id_venta=venta_id_venta 
			 INNER JOIN producto on id_producto=producto_id_producto
			 where nombre=:nombre_producto and fecha between :fecha_inicial and :fecha_final";
		$query=$this->acceso->prepare($sql);
		$query->execute(array('nombre_producto'=>$nombre_producto,':fecha_inicial'=>$fecha_inicial,':fecha_final'=>$fecha_final));
			return $this->objetos;			
	}
	function rellenar_productos(){
		$sql="SELECT *FROM producto order by nombre asc";
		$query=$this->acceso->prepare($sql);
		$query->execute();
		$this->objetos=$query->fetchall();
		return $this->objetos;
	}

}


 ?>