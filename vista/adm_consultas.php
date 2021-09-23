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
	          </div>
	      </div><!-- /.container-fluid -->
	    </section>	
	    <div class="container-fluid">
		<div class="card card-primary">
         <div class="card-header">
          <h3>consultas generales</h3>
          </div>
		  <div class="card-body">
		  <div class="row">
		  <div class="col-md-12">
		  <h2> ventas por mes gestion-2020</h2>
		  <div class="chart-responsive">
		  	<canvas id='Grafico1'style="min-height:250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>				 										
	    					</div>
	    					<div class="card-body p-0">
	    						<div class="tab-content">
	    							<div class="tab-pane active" id="laboratorio">
	    									<div class="card-header">
	    										<form id="form-fecha">		      			
									      			<div class="row">
									      				<div class="form-group col-5 pl-5">
										      				<label for="fecha"class="center">Fecha Inicio</label>
										      				<input id="fecha_inicio" type="date" class="form-control" placeholder="Ingrese fecha Inicio" required>
										      			</div>
										      			<div class="form-group col-4">
										      				<label for="fecha">Fecha final</label>
										      				<input id="fecha_final" type="date" class="form-control" placeholder="Ingrese fecha final" required>
										      			</div>	  
										      			 <button type="submit" class="btn bg-gradient-primary float-right m-2 pt-lg-0">Buscar</button> 
										      			 <button type="button" class="imprimir_reporte btn bg-gradient-primary float-right m-2 pt-lg-0">IMPRIMIR</button> 
										      			    		
										      		</div>	      			      			
									      		</form>										
	    									</div>
	    									<div class="card-body p-0 table-responsive">
	    										<table id="tabla_venta" class="table table-borderless" style="width:100%">
											        <thead>
											            <tr>
											                <th>N#</th>
											                <th>Fecha</th>
											                <th>Nombre cliente</th>
											                <th>CI</th>
											                <th>Total</th>
											                <th>Vendedor</th>
											            </tr>
											        </thead>	
		  </div>
     	 </div>
      </div>	  
  </div>
  </div>
  </div>
	</div>
	  </div>
	  
	  
	  <!-- /.content-wrapper -->

	  
<?php 
	include_once 'layouts/footer.php';
}
else{
header('Location:../index.php');
}

?>
<script src="../js/Chart.min.js"></script>
 <script src="../js/consultas.js"></script>
 <script src="../js/reporte.js"></script>
 <script src="../js/datatables.js"></script>

