<?php 
session_start();
if ($_SESSION['us_tipo']==1||$_SESSION['us_tipo']==3){
	include_once 'layouts/header.php';
?>
	  <title>Adm|Atributo</title>
	  <!-- Tell the browser to be responsive to screen width -->
		<?php 
			include_once 'layouts/nav.php';
		 ?>
<!--Modalcambiophoto-->		 
<div class="modal fade" id="cambiologo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Cambiar Logo</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="text-center">
	        	<img id="logoactual" src="../img/avatar.png" class="profile-user-img img-fluid img-circle">
	        </div>
	        <div class="text-center">
	        	<b id="nombre_logo">
	        	</b>
	        </div>
	        <div class="alert alert-success text-center" id="edit" style="display: none;">
	        	<span><i class="fas fa-check m-1"></i>El logo se Edito</span>
	        </div>
	        <div class="alert alert-danger text-center" id="noedit" style="display: none;">
	        	<span><i class="fas fa-times m-1"></i>Formato no Soportado</span>
	        </div>
	        <form id="form-logo" enctype="multipart/form-data">
	        	<div class="input-group mb-3 ml-5 mt-2">
	        		<input type="file" name="photo" class="input-group">
	        		<input type="hidden" name="funcion" id="funcion">
	        		<input type="hidden" name="id_logo_lab" id="id_logo_lab">
	        	</div>	        	
	        	<div class="modal-footer">
			        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
			        <button type="submit" class="btn bg-gradient-primary">Guardar</button>	    	
	     		 </div>        	        	
	        </form>
	      </div>
	      
	    </div>
	  </div>
	</div>


<!-- ModalCrearLaboratorio-->
<div class="modal fade" id="crearlaboratorio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	    <div class="modal-content">
	      	<div class="card card-success">
		      	<div class="card-header">
		      		<h3 class="card-title">Crear Marca</h3>
		      		<button data-dismiss="modal" aria-label="close" class="close">
		      			<span arial-hidden="true">&times;</span>
		      		</button>
		      	</div>
	      		<div class="card-body">
		      		<div class="alert alert-success text-center" id="add-laboratorio" style="display: none;">
		        		<span><i class="fas fa-check m-1"></i>Se agrego correctamente</span>
		       		 </div>
		        	<div class="alert alert-danger text-center" id="noadd-laboratorio" style="display: none;">
		        		<span><i class="fas fa-times m-1"></i>El Laboratorio ya existe</span>
		       		 </div>
		       		 <div class="alert alert-success text-center" id="edit-lab" style="display: none;">
		        		<span><i class="fas fa-check m-1"></i>Se edito correctamente</span>
		       		 </div>
		      		<form id="form-crear-laboratorio" method="POST">
		      			<div class="form-group">
		      				<label for="nombre-laboratorio">Nombre</label>
		      				<input id="nombre-laboratorio" type="text" class="form-control" placeholder="Ingrese nombre" required>
		      				<label for="imagen-laboratorio">Nombre</label>
		      				<input type="hidden" id="id_editar_lab">
		      			</div>		
		      			<div class="card-footer">
				      		<button type="submit" class="btn bg-gradient-success float-right m-1">Guardar</button>				      		
				      		<button type="button" data-dismiss="modal" class="btn upload btn-outline-secondary float-right m-1">Cerrar</button>
				      	</div>    
				    </form>  			
	      		</div>		  
	    	</div>
		</div>
 	</div>
</div>

<!-- ModalCrearTipo-->
<div class="modal fade" id="creartipo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	    <div class="modal-content">
	      	<div class="card card-success">
		      	<div class="card-header">
		      		<h3 class="card-title">Crear Tipo Material</h3>
		      		<button data-dismiss="modal" aria-label="close" class="close">
		      			<span arial-hidden="true">&times;</span>
		      		</button>
		      	</div>
	      		<div class="card-body">
		      		<div class="alert alert-success text-center" id="add-tipo" style="display: none;">
		        		<span><i class="fas fa-check m-1"></i>Se agrego correctamente</span>
		       		 </div>
		        	<div class="alert alert-danger text-center" id="noadd-tipo" style="display: none;">
		        		<span><i class="fas fa-times m-1"></i>El Tipo ya existe</span>
		       		 </div>
		       		 <div class="alert alert-success text-center" id="edit-tip" style="display: none;">
		        		<span><i class="fas fa-check m-1"></i>Se edito correctamente</span>
		       		 </div>
		      		<form id="form-crear-tipo">
		      			<div class="form-group">
		      				<label for="nombre-tipo">Nombre</label>
		      				<input id="nombre-tipo" type="text" class="form-control" placeholder="Ingrese nombre" required>
		      				<input type="hidden" id="id_editar_tip">
		      			</div>		      			
	      		</div>
		      	<div class="card-footer">
		      		<button type="submit" class="btn bg-gradient-success float-right m-1">Guardar</button>
		      		</form>
		      		<button type="button" data-dismiss="modal" class="btn btn-outline-secondary float-right m-1">Cerrar</button>
		      	</div>
	    	</div>
		</div>
 	</div>
</div>

<!-- ModalCrearPresentacion-->
<div class="modal fade" id="crearpresentacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	    <div class="modal-content">
	      	<div class="card card-success">
		      	<div class="card-header">
		      		<h3 class="card-title">Agregar Modelo</h3>
		      		<button data-dismiss="modal" aria-label="close" class="close">
		      			<span arial-hidden="true">&times;</span>
		      		</button>
		      	</div>
	      		<div class="card-body">
		      		<div class="alert alert-success text-center" id="add-pre" style="display: none;">
		        		<span><i class="fas fa-check m-1"></i>Se agrego correctamente</span>
		       		 </div>
		        	<div class="alert alert-danger text-center" id="noadd-pre" style="display: none;">
		        		<span><i class="fas fa-times m-1"></i>La presentacion ya existe</span>
		       		 </div>
		       		 <div class="alert alert-success text-center" id="edit-pre" style="display: none;">
		        		<span><i class="fas fa-check m-1"></i>Se edito correctamente</span>
		       		 </div>
		      		<form id="form-crear-presentacion">
		      			<div class="form-group">
		      				<label for="nombre-presentacion">Nombre</label>
		      				<input id="nombre-presentacion" type="text" class="form-control" placeholder="Ingrese nombre" required>
		      				<input type="hidden" id="id_editar_pre">
		      			</div>		      			
	      		</div>
		      	<div class="card-footer">
		      		<button type="submit" class="btn bg-gradient-primary float-right m-1">Guardar</button>
		      		</form>
		      		<button type="button" data-dismiss="modal" class="btn btn-outline-secondary float-right m-1">Cerrar</button>
		      	</div>
	    	</div>
		</div>
 	</div>
</div>

	  <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-12">
	         <!--   <h1>Gestion De Atributos</h1> -->
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
	    					<div class="card-body p-0">
	    						<div class="tab-content">
	    							<div class="tab-pane active" id="laboratorio">
	    								<div class="card card-success">
	    									<div class="card-header">
	    										<div class="card-title">
	    											<button type="button" data-toggle="modal" data-target="#crearlaboratorio" class="btn bg-gradient-success btn-sm m-2">Agregar Marca</button>
													<button type="button" data-toggle="modal" data-target="#crearpresentacion" class="btn bg-gradient-success btn-sm m-2">Agregar Modelo</button>
													<button type="button" data-toggle="modal" data-target="#creartipo" class="btn bg-gradient-success btn-sm m-2">Agregar Tipo Material</button>
	    										</div>
	    									<!--	<div class="input-group">
	    											<input id="buscar-laboratorio" type="text" class="form-control float-left" placeholder="Ingrese Nombre">
	    											<div class="input-group-append">
	    												<button class="btn btn-default"><i class="fas fa-search"></i></button>
	    											</div>
	    										</div>-->
	    									</div>
	    									
											<div class="row">
											<div class="col-4">
											<div class="card-body p-0 table-responsive">
	    										<table class="table table-hover text-nowrap">
	    											<thead class="table-primary">
	    												<tr>
	    													<th>Empresas</th>
	    													<th>Logo</th>
	    													<th>Accion</th>
	    												</tr>
	    											</thead>
	    											<tbody class="table-active" id="laboratorios">	
	    											</tbody>
	    										</table>
	    									</div>	
											</div>
											<div class="col-4">
											<div class="row">
											<div class="card-body p-0 table-responsive">
	    										<table class="table table-hover text-nowrap">
	    											<thead class="table-primary">
	    												<tr>	    													
	    													<th>Presentacion</th>	  		
	    													<th>Accion</th>
	    												</tr>
	    											</thead>
	    											<tbody class="table-active" id="presentaciones">	    												
	    											</tbody>
	    										</table>
	    									</div>
												
											</div>
											</div>
                                          <div class="col-4">
										  <div clas="row">
											<div class="card-body p-0 table-responsive">
	    										<table class="table table-hover text-nowrap">
	    											<thead class="table-primary">
	    												<tr>	    													
	    													<th>Tipos</th>	  		
	    													<th>Accion</th>
	    												</tr>
	    											</thead>
	    											<tbody class="table-active" id="tipos">	    												
	    											</tbody>
	    										</table>
	    									</div>
												
											</div>
										  </div>
											
											</div>
	    								</div>
	    							</div>
	    							<div class="tab-pane" id="tipo">
	    								<div class="card card-success">
	    									<div class="card-header">
	    										<div class="card-title">Buscar Tipo
	    											<button type="button" data-toggle="modal" data-target="#creartipo" class="btn bg-gradient-success btn-sm m-2">Crear Tipo</button>	    											
	    										</div>
	    										<div class="input-group">
	    											<input id="buscar-tipo" type="text" class="form-control float-left" placeholder="Ingrese Nombre">
	    											<div class="input-group-append">    												<button class="btn btn-default"><i class="fas fa-search"></i></button>
	    											</div>
	    										</div>
	    									</div>
	    									
	    									<div class="card-footer"></div>
	    								</div>
	    							</div>
	    							<div class="tab-pane" id="presentacion">
	    								<div class="card card-success">
	    									<div class="card-header">
	    										<div class="card-title">Buscar Presentacion
	    											<button type="button" data-toggle="modal" data-target="#crearpresentacion" class="btn bg-gradient-primary btn-sm m-2">Crear Presentacion</button>
	    										</div>
	    										<div class="input-group">
	    											<input id="buscar-presentacion" type="text" class="form-control float-left" placeholder="Ingrese Nombre">
	    											<div class="input-group-append">
	    												<button class="btn btn-default"><i class="fas fa-search"></i></button>
	    											</div>
	    										</div>
	    									</div>
	    							</div>
	    						</div>
	    					</div>
	    				</div>
	    			</div>
	    		</div>
	    	</div>
	    </section>
	    <!-- /.content -->
	  </div>
	  <!-- /.content-wrapper -->

	  
<?php 
	include_once 'layouts/footer.php';
}
else{
header('Location:../index.php');
}


 ?>
<script src="../js/Empresa.js"></script>
<script src="../js/Tipo.js"></script>
<script src="../js/Presentacion.js"></script>
<script src="../js/subirImagenes.js"></script>
