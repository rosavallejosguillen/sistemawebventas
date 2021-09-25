<?php 
session_start();
if ($_SESSION['us_tipo']==1||$_SESSION['us_tipo']==3){
	include_once 'layouts/header.php';
?>
	  <title>Adm|Editar Datos</title>
	  <!-- Tell the browser to be responsive to screen width -->
		<?php 
			include_once 'layouts/nav.php';
		 ?>	
<!-- ModalCrearLote -->
<sdiv class="modal fade" id="crearlote" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	    <div class="modal-content">
	      	<div class="card card-success">
		      	<div class="card-header">
		      		<h3 class="card-title">Crear</h3>
		      		<button data-dismiss="modal" aria-label="close" class="close">
		      			<span arial-hidden="true">&times;</span>
		      		</button>
		      	</div>
	      		<div class="card-body">
		      		<div class="alert alert-success text-center" id="add-lote" style="display: none;">
		        		<span><i class="fas fa-check m-1"></i>Se agrego correctamente</span>
		       		</div>		        
		      		<form id="form-crear-lote">
		      			<div class="form-group">
		      				<label for="nombre_producto_lote" for="stock">Producto: </label>
		      				<label id="nombre_producto_lote" >Nombre Producto</label>		      				
		      			</div>
		      			<div class="form-group">
		      				<label for="proveedor">Proveedor: </label>
		      				<select name="proveedor" id="proveedor" class="form-control select2" style="width: 100%">
		      					
		      				</select>
		      			</div>
		      			<div class="form-group">
		      				<label for="stock">Stock</label>
		      				<input id="stock" type="text" class="form-control" placeholder="Ingrese Sotck" >
		      			</div>
		      			<div class="form-group">
		      				<label for="vencimiento">Registro Producto</label>
		      				<input id="vencimiento" type="date" class="form-control" placeholder="Ingrese vencimiento">
		      			</div>		      			
		      			<input type="hidden" id="id_lote_prod"> 
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
	        		<input type="hidden" name="id_logo_prod" id="id_logo_prod">
	        		<input type="hidden" name="avatar" id="avatar">
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

<!-- ModalCrearProducto -->
<div class="modal fade" id="crearproducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	    <div class="modal-content">
	      	<div class="card card-success">
		      	<div class="card-header">
		      		<h3 class="card-title">Crear producto</h3>
		      		<button data-dismiss="modal" aria-label="close" class="close">
		      			<span arial-hidden="true">&times;</span>
		      		</button>
		      	</div>
	      		<div class="card-body">
		      		<div class="alert alert-success text-center" id="add" style="display: none;">
		        		<span><i class="fas fa-check m-1"></i>Se agrego correctamente</span>
		       		</div>
		        	<div class="alert alert-danger text-center" id="noadd" style="display: none;">
		        		<span><i class="fas fa-times m-1"></i>El producto ya existe</span>
		       		</div>
		       		<div class="alert alert-success text-center" id="edit_prod" style="display: none;">
		        		<span><i class="fas fa-check m-1"></i>Se edito Correctamente</span>
		       		</div>
		      		<form id="form-crear-producto">
		      			<div class="form-group">
		      				<label for="nombre_producto">Producto</label>
		      				<input id="nombre_producto" type="text" class="form-control" placeholder="" required>
		      			</div>
		      			<div class="form-group">
		      				<label for="concentracion">Modelo</label>
		      				<input id="concentracion" type="text" class="form-control" placeholder="" >
		      			</div>
		      			<div class="form-group">
		      				<label for="adicional">Color</label>
		      				<input id="adicional" type="text" class="form-control" placeholder="">
		      			</div>
		      			<div class="form-group">
		      				<label for="precio">Precio</label>
		      				<input id="precio" type="number" step="any" class="form-control" value="1" placeholder="" required>
		      			</div>
		      			<div class="form-group">
		      				<label for="laboratorio">Empresa</label>
		      				<select name="laboratorio" id="laboratorio" class="form-control select2" style="width: 100%">
		      					
		      				</select>
		      			</div>
		      			<div class="form-group">
		      				<label for="tipo">Tipo</label>
		      				<select name="tipo" id="tipo" class="form-control select2" style="width: 100%">
		      					
		      				</select>
		      			</div>		      			
		      			<div class="form-group">
		      				<label for="presentacion">Presentacion</label>
		      				<select name="presentacion" id="presentacion" class="form-control select2" style="width: 100%">
		      					
		      				</select>
		      			</div>
		      			<input type="hidden" id="id_edit_prod"> 
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

	  <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-4">
	          <div class="col-sm-12">
	            <h1>
					<button id="button-crear" type="button" data-toggle="modal" data-target="#crearproducto" class="btn bg-gradient-success ml-2">Crear Producto</button>					
	            </h1>	            	            
	          </div>
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="adm_catalogo.php"></a></li>
	              
	            </ol>
	          </div>
	        </div>
	      </div><!-- /.container-fluid -->
	    </section>	
	    <section>
	    	<div class="container-fluid">
	  <!--  		<div class="card-primary">
	    			<div class="card-header">
	    				<h3 class="card-title">Buscar producto</h3> 
	    				<div class="input-group">
	    					<input type="text" id="buscar-producto" class="form-control float-left" placeholder="Ingrese el nombre de producto"> 
	    					<div class="input-group-append">
	    						<button class="btn btn-default">
	    							<i class="fas fa-search"></i>
	    						</button> 
	    					</div>
	    				</div>
	    			</div> -->
	    			<div class="card-body">
	    			<!--	<div id="productos" class="row d-flex aling-items-strech"> -->
	    				</div>
						<div class="card-body p-0 table-responsive">
	    										<table class="table table-hover text-nowrap">
	    											<thead class="table-primary">
	    												<tr>	    													
	    													<th>codigo</th>	  		
	    													<th>Stock</th>
															<th>Producto</th>
															<th>Precio</th>
															<th>Modelo</th>
															<th>Color</th>
															<th>Marca</th>
															<th>Presentacion</th>
															<th>Combo</th>
															<th>botones</th>											
	    												</tr>
	    											</thead>
	    									<tbody  id="productos" class="table-active">	    												
	    							</tbody>
	    					</table>
	    				</div>
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
 <script src="../js/Producto.js"></script>
