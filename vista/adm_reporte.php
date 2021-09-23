<?php 
session_start();
if ($_SESSION['us_tipo']==1){
	include_once 'layouts/header.php';
?>
	 <title>Adm|Reportes de Ventas</title>
	  <!-- Tell the browser to be responsive to screen width -->
		<?php 
			include_once 'layouts/nav.php';
		 ?>	
		 <!-- ModalVentas-->
<div class="modal fade" id="vista_venta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
	    <div class="modal-content">
	      	<div class="card card-success">
		      	<div class="card-header">
		      		<h3 class="card-title">Registro de venta</h3>
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
		      			<thead class="table-success">
		      				<tr>
		      					<th>Cantidad</th>
		      					<th>Precio</th>
		      					<th>Producto</th>
		      					<th>Concentracion</th>
		      					<th>Laboratorio</th>
		      					<th>Presentacion</th>
		      					<th>Tipo</th>
		      					<th>Subtotal</th>
		      				</tr>
		      			</thead>
		      			<tbody class="table-warning" id="registros">
		      				
		      			</tbody>
		      		</table>
		      		<div class="float-md-right input-group-append">
		      			<h3 class="m-3">Total: </h3>
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
	  <!-- Content Wrapper. Contains page content -->
	 
	  <!-- /.content-wrapper -->
	  <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1>Reporte de Ventas</h1>
	          </div>
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="#">Home</a></li>
	              <li class="breadcrumb-item active">Reporte de ventas</li>
	            </ol>
	          </div>
	        </div>
	      </div><!-- /.container-fluid -->
	    </section>

	    <!-- Main content -->
	    <section class="content">
	    	<div class="container-fluid">
	    		<div class="row">
	    			<div class="col-md-12">
	    				<div class="card">
	    					<div class="card-header">
	    						<ul class="nav nav-pills">
	    							<li class="nav-item"><a href="#laboratorio" class="nav-link active" data-toggle="tab">Reporte General de Ventas</a></li>
	    							<li class="nav-item"><a href="#tipo" class="nav-link" data-toggle="tab">Reporte de Ventas por Producto</a></li>	    							
	    						</ul>
	    					</div>
	    					<div class="card-body p-0">
	    						<div class="tab-content">
	    							<div class="tab-pane active" id="laboratorio">
	    								<div class="card card-success">
	    									<div class="card-header">
	    										<form id="form-fecha">		      			
									      			<div class="row">
									      				<div class="form-group col-3 pl-4">
										      				<label for="fecha">Fecha Inicio</label>
										      				<input id="fecha_inicio" type="date" class="form-control" placeholder="Ingrese fecha Inicio" required>
										      			</div>
										      			<div class="form-group col-3">
										      				<label for="fecha">Fecha final</label>
										      				<input id="fecha_final" type="date" class="form-control" placeholder="Ingrese fecha final" required>
										      			</div>	  
										      			 <button type="submit" class="btn bg-gradient-primary float-right m-4 pt-lg-0">Buscar</button> 
										      			 <button type="button" class="imprimir_reporte btn bg-gradient-primary float-right m-4 pt-lg-0"><i class="fas fa-print"></i></button> 
										      			    		
										      		</div>	      			      			
									      		</form>										
	    									</div>
	    									<div class="card-body p-0 table-responsive">
	    										<table id="tabla_venta" class="display table table-hover text-nowrap col-auto" style="width:100%">
											        <thead>
											            <tr>
											                <th>Codigo</th>
											                <th>Fecha</th>
											                <th>Nombre del cliente</th>
											                <th>C.I.</th>
											                <th>Total</th>
											                <th>Vendedor</th>
											               <!-- <th>Accion</th>-->
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
	    							<div class="tab-pane" id="tipo">
	    								<div class="card card-success">
	    									<div class="card-header">
	    										<form id="form-fecha_producto">		      			
									      			<div class="row">
									      				<div class="form-group col-3 pl-4">
										      				<label for="fecha">Fecha Inicio</label>
										      				<input id="fecha_inicio_prod" type="date" class="form-control" placeholder="Ingrese fecha Inicio" required>
										      			</div>
										      			<div class="form-group col-3">
										      				<label for="fecha">Fecha final</label>
										      				<input id="fecha_final_prod" type="date" class="form-control" placeholder="Ingrese fecha final" required>
										      			</div>	  
										      			<div class="form-group">
										      				<label for="tipo">Seleccione el Producto</label>
										      				<select name="nombre_producto" id="nombre_producto" class="form-control select2" style="width: 100%">
										      					
										      				</select>
										      			</div>		   
										      			 <button type="submit" class="btn bg-gradient-primary float-right m-4 pt-lg-0">Buscar</button>   
										      			 <button type="button" class="imprimir_reporte_producto btn bg-gradient-primary float-right m-4 pt-lg-0"><i class="fas fa-print"></i></button>  			
										      		</div>	      			      			
									      		</form>						    										
	    									</div>
	    									<div class="card-body p-0 table-responsive">
	    										<table id="tabla_venta_productos" class="display table table-hover text-nowrap col-auto" style="width:100%">
											        <thead>
											            <tr>
											                <th>Nombre del Cliente</th>
											                <th>Producto</th>
											                <th>Cantiadad</th>
											                <th>Precio</th>
											                <th>Fecha</th>											                
											               	<th>SubtotalTotal</th>
											            </tr>
											        </thead>	
											        <tbody>
											        	
											        </tbody>				       
											    </table>
	    									</div>
	    									<div class="card-footer"></div>
	    								</div>
	    							</div>	    							
	    						</div>
	    					</div>
	    					<div class="card-footer">
	    						
	    					</div>
	    				</div>
	    			</div>
	    		</div>
	    	</div>
	    </section>
	    <!-- /.content -->
	  </div>

	  
<?php 
	include_once 'layouts/footer.php';
}
else{
header('Location:../index.php');
}

?>
<script src="../js/datatables.js"></script>
 <script src="../js/reporte.js"></script>

