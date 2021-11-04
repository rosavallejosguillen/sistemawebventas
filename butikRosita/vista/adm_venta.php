<?php 
session_start();
if ($_SESSION['us_tipo']==3 || $_SESSION['us_tipo']==1){
	include_once 'layouts/header.php';
?>
<!-- ModalVentas-->
<div class="modal fade" id="vista_venta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
	    <div class="modal-content">
	      	<div class="card card-tittle">
		      	<div class="card-header">
		      		<h3 class="card-titl">Reporte de venta</h3>
		      		<button data-dismiss="modal" aria-label="close" class="close">
		      			<span arial-hidden="true">&times;</span>
		      		</button>
		      	</div>
	      		<div class="card-body">
		      		<div class="form-group">
		      			<label for="codigo_venta">Codigo Venta: </label>
		      			<span id="codigo_venta"></span>
		      		</div>
		      		<div class="form-group">
		      			<label for="fecha">Fecha: </label>
		      			<span id="fecha"></span>
		      		</div>
		      		<div class="form-group">
		      			<label for="cliente">Cliente: </label>
		      			<span id="cliente"></span>
		      		</div>
		      		<div class="form-group">
		      			<label for="dni">C.I: </label>
		      			<span id="dni"></span>
		      		</div>
		      		<div class="form-group">
		      			<label for="vendedor">Vendedor: </label>
		      			<span id="vendedor"></span>
		      		</div>
		      		<table class="table table-hover text-nowrap">
		      			<thead class="">
		      				<tr>
		      					<th>Cantidad</th>
		      					<th>Precio</th>
		      					<th>Producto</th>
		      					<th>Concentracion</th>
		      					<th>Laboratorio</th>
		      					<th>Presentacion</th>
		      					<th>Tipo</th>
		      					<th>Total a pagar</th>
		      				</tr>
		      			</thead>
		      			<tbody class="" id="registros">
		      				
		      			</tbody>
		      		</table>
		      		<div class=""> <!--float-right input-group-append-->
		      			<h3 class="m-6">Total: </h3>
		      			<h3 class="m-3" id="total"></h3>
		      		</div>
	      		</div>
		      	<div class="card-footer">		      		
		      		<button type="button" data-dismiss="modal" class="btn btn-outline-secondary float-right m-1">Cerrar</button>
		      	</div>
	    	</div>
		</div>
 	</div>
</div>

	  <title>Adm|Gestion Ventas</title>
	  <!-- Tell the browser to be responsive to screen width -->
		<?php 
			include_once 'layouts/nav.php';
		 ?>	

	  <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1></h1>	            	            
	          </div>
	       
	      </div><!-- /.container-fluid -->
	    </section>	
	    <section>
	    	<div class="container-fluid">
	    		<div class="card-primary">
	    			<div class="card-header">
	    				<h3 class="card-title">Buscar Ventas</h3>
	    				
	    			</div>
	    			<div class="card-body">
	    				<table id="tabla_venta" class="table table-borderless" style="width:100">
					        <thead>
					            <tr>
					                <th>Codigo</th>
					                <th>Fecha</th>
					                <th>Nombre del cliente</th>
					                <th>C.I.</th>
					                <th>Total</th>
					                <th>Vendedor</th>
					                <th>Botones De accion</th>
					            </tr>
					        </thead>	
					        <tbody>
					        	
					        </tbody>				       
					    </table>
	    			</div>
	    			<div class="card-footer">
	    				
	    			</div>
	    		</div>
	    	</div>
	    </section>    	   
	  </div>
	  <!-- /.content-wrapper -->

	  
<?php 
	include_once 'layouts/footer.php';
}
else{
header('Location:../index.php');
}

?>
<script src="../js/datatables.js"></script>
 <script src="../js/Venta.js"></script>

