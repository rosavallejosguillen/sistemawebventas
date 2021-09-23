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

	<!-- ModalCambioContrasena -->
	<div class="modal fade" id="cambiocontra" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Cambiar Contraseña</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="text-center">
	        	<img id="avatar3" src="../img/avatar.png" class="profile-user-img img-fluid img-circle">
	        </div>
	        <div class="text-center">
	        	<b>
	        		<?php 
	        			echo $_SESSION['nombre_us'];
	        		 ?>
	        	</b>
	        </div>
	        <div class="alert alert-black text-center" id="update" style="display: none;">
	        	<span><i class="fas fa-check m-1"></i>Se cambio la contraseña correctamente</span>
	        </div>
	        <div class="alert alert-danger text-center" id="noupdate" style="display: none;">
	        	<span><i class="fas fa-times m-1"></i>La contraseña no es correcto</span>
	        </div>
	        <form id="form-pass" >
	        	<div class="input-group mb-3">
	        		<div class="input-group-prepend">
	        			<span class="input-group-text"> <!--<i class="fas fa-unlock-alt"></i>--></span>
	        		</div>
	        		<input id="oldpass" type="password" class="form-control" placeholder="Ingrese contraseña actual">
	        	</div>
	        	<div class="input-group mb-3">
	        		<div class="input-group-prepend">
	        			<span class="input-group-text"> <!--<i class="fas fa-lock"> </i> --></span>
	        		</div>
	        		<input id="newpass" type="text" class="form-control" placeholder="Ingrese contraseña nueva">
	        	</div>	
	        	<div class="modal-footer">
			        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
			        <button type="submit" class="btn bg-gradient- black">Guardar</button>	    	
	     		 </div>        	        	
	        </form>
	      </div>
	      
	    </div>
	  </div>
	</div>
<!-- ModalCambioFoto -->
	<div class="modal fade" id="cambiophoto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-header" id="exampleModalLabel">Cambiar Imagen</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="text-center">
	        	<img id="avatar1" src="../img/avatar.png" class="profile-user-img img-fluid img-circle">
	        </div>
	        <div class="text-center">
	        	<b>
	        		<?php 
	        			echo $_SESSION['nombre_us'];
	        		 ?>
	        	</b>
	        </div>
	        <div class="alert alert-success text-center" id="edit" style="display: none;">
	        	<span><i class="fas fa-check m-1"></i>Se cambio la imagen</span>
	        </div>
	        <div class="alert alert-danger text-center" id="noedit" style="display: none;">
	        	<span><i class="fas fa-times m-1"></i>Formato no Soportado</span>
	        </div>
	        <form id="form-photo" enctype="multipart/form-data">
	        	<div class="input-group mb-3 ml-5 mt-2">
	        		<input type="file" name="photo" class="input-group">
	        		<input type="hidden" name="funcion" value="cambiar_foto">
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

	  <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-12">
	          <div class="col-sm-12">
	             <h2>Configuracion de usuario</h2>
	          </div>
	        </div>
	      </div><!-- /.container-fluid -->
	    </section>	
	    <section>
	    	<div class="content center">
	    		<div class="container center">
	    			<div class="row">
	    				<div class="col-sm-6">
	    					<div class="card card-dark card-outline">
	    						<div class="card-body box-profile">
	    					<!--		<div class="text-center">
	    								<img id="avatar2" src="../img/avatar.png" class="profile-user-img img-fluid img-circle">						
	    							</div> -->
	    					<!--		<div class="text-center mt-6">
	    								<button type='button' data-toggle="modal" data-target="#cambiophoto" class="btn btn-primary btn-sm">Cambiar Imagen</button>
	    							</div> -->
	    							<input type="hidden" id="id_usuario" value="<?php echo $_SESSION['usuario']?>">
	    							<div class="card">
										<div class="card-body">
										<h3 id="nombre_us" class="profile-username text-center text-dark">Nombre</h3>
										<p id="apellidos_us" class="text-muted text-center">Apellidos</p>
											<p class="card-text"></p>
										</div>
										<div class="card-footer">
										</div>
									</div>	
									<ul class="list-group list-group-unbordered mb-3">
	    									<li class="list-group-item">
	    										<b style="color:#008C7D">Edad</b><a id="edad" class="float-right"></a>
	    									</li>
	    									<li class="list-group-item">
	    										<b style="color:#008C7D">C.I</b><a id="dni_us" class="float-right"></a>
	    									</li>
	    									<li class="list-group-item">
	    										<b style="color:#008C7D">Tipo Usuario</b>
	    										<span id="us_tipo" class="float-right"></span>
	    									</li>	    									
											<button data-toggle="modal" data-target="#cambiocontra" type="button" class="btn btn-dark btn-sm">Cambiar password</button>
	    							</ul>
	    						</div>
	    					</div>
							<div class="content center">
	    		<div class="container center">
	    			<div class="row">
	    				<div class="col-sm-12">
	    					<div class="card card-dark card-outline">
	    						<div class="card-body box-profile">
	    							<div class="text-center">

		    					<div class="card card-dark">
		    						<div class="card text-white bg-dark mb-6">
		    							<h3 class="card-title">Sobre mi</h3>
		    						</div>
		    						<div class="card-body">
		    							<strong style="color:#008C7D">
		    								</i>Telefono
		    							</strong>
		    							<p id="telefono_us" class="text-muted">654564</p>
		    							<strong style="color:#008C7D">
		    								</i>Residencia
		    							</strong>
		    							<p id="residencia_us" class="text-muted">654564</p>
		    							<strong style="color:#008C7D">
		    								Correo
		    							</strong>
		    							<p id="correo_us" class="text-muted">654564</p>
		    							<strong style="color:#008C7D">
		    								Sexo
		    							</strong>
		    							<p id="sexo_us" class="text-muted">654564</p>
		    							<strong style="color:#008C7D">
		    								Informacion Adicional
		    							</strong>
		    							<p id="adicional_us" class="text-muted">654564</p>
		    							<button class="edit btn btn-block bg-gradient-dark" type=>Editar</button>
		    						</div>
		    						
	    						</div>
	    				</div>
						</div>
						</div>
						</div>
						</div>
						</div>
						</div>
	    				<div class="col-md-12">
	    					
	    						<div class="card-header">
	    							<h3 class="card text-white bg-dark mb-6">Editar Datos Personales</h3>
	    						</div>
	    						<div class="card-body">
	    							<div class="alert alert-dark text-center" id="editado" style="display: none;">
	    								<span><i class="fas fa-check m-1"></i>Editado</span>
	    							</div>
	    							<div class="alert alert-dark text-center" id="noeditado" style="display: none;">
	    								<span><i class="fas fa-times m-1"></i>Edicion Deshabilitado</span>
	    							</div>
	    							<form id="form-usuario" action="" class="form-horizontal">
	    								<div class="form-group row">
	    									<label for="telefon" class="col-sm-2 col-form-label">Telefono</label>
	    									<div class="col-sm-10">
	    										<input type="number" id="telefono" class="form-control">
	    									</div>	   					
	    								</div>
	    								<div class="form-group row">
	    									<label for="residencia" class="col-sm-2 col-form-label">Residencia</label>
	    									<div class="col-sm-10">
	    										<input type="text" id="residencia" class="form-control">
	    									</div>	   					
	    								</div>
	    								<div class="form-group row">
	    									<label for="correo" class="col-sm-2 col-form-label">Correo</label>
	    									<div class="col-sm-10">
	    										<input type="text" id="correo" class="form-control">
	    									</div>	   					
	    								</div>
	    								<div class="form-group row">
	    									<label for="sexo" class="col-sm-2 col-form-label">Sexo</label>
	    									<div class="col-sm-10">
	    										<input type="text" id="sexo" class="form-control">
	    									</div>	   					
	    								</div>
	    								<div class="form-group row">
	    									<label for="adicional" class="col-sm-2 col-form-label">Infacion Adicional</label>
	    									<div class="col-sm-10">
	    										<textarea class="form-control" id="adicional" cols="2" rows="2"></textarea>
	    									</div>	   					
	    								</div>
	    								<div class="form-group row">
	    									<div class="offset-sm-2 col-sm-10 float-right">
	    										<button type="" class="edit btn btn-block bg-gradient-dark">Guardar</button>
	    									</div>
	    								</div>
	    							</form>
	    						</div>
	    						
	    					</div>	    					
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
 <script src="../js/Usuario.js"></script>
