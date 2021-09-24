<?php 
session_start();
if ($_SESSION['us_tipo']==1||$_SESSION['us_tipo']==3){
	include_once 'layouts/header.php';
?>
	  <title>Adm|Venta</title>
	  <!-- Tell the browser to be responsive to screen width -->
		<?php 
			include_once 'layouts/nav.php';
		 ?>
<!-- ModalCrearCliente-->
<div class="modal fade" id="crearcliente1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	    <div class="modal-content">
	      	<div class="card card-success">
		      	<div class="card-header">
		      		<h3 class="card-title">Registrar cliente9</h3>
		      		<button data-dismiss="modal" aria-label="close" class="close">
		      			<span arial-hidden="true">&times;</span>
		      		</button>
		      	</div>
                <div class="card-body">
                    <div class="alert alert-success text-center" id="add" style="display: none;">
                        <span><i class="fas fa-check m-1"></i>Se agrego correctamente</span>
                    </div>
                    <div class="alert alert-danger text-center" id="noadd" style="display: none;">
                        <span><i class="fas fa-times m-1"></i>El C.I ya existe</span>
                    </div>
                    <div class="alert alert-success text-center" id="edit-client" style="display: none;">
                        <span><i class="fas fa-check m-1"></i>Se edito correctamente</span>
                     </div>
                    <form id="form-crear-cliente">
                    <div class="input-group">
                        <!---    <input id="buscar-cliente" type="text" class="form-control float-left" placeholder="Ingrese Nombre">
                          <div class="input-group-append">
                                <button class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div> -->
                        </div> 
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input id="nombre-cliente" type="text" class="form-control" placeholder="" required>
                        </div> 
                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input id="apellido-cliente" type="text" class="form-control" placeholder="" required>
                        </div>                        
                        <div class="form-group">
                            <label for="dni">C.I</label>
                            <input id="dni-cliente" type="text" class="form-control" placeholder="" required>
                        </div>                                        
                        <input type="hidden" id="id_editar_cliente">
                        <div class="card-footer">
                            <button type="submit" class="btn bg-gradient-success float-right m-1">Guardar</button>
                            
                            <button type="button" data-dismiss="modal" class="btn bg-gradient-success    float-right m-1">Cerrar</button>
                        </div>
                    </form>
                    
                   
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
	        <div class="row mb-">
	          <div class="col-sm-6">
	            
	          </div>
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="#"></a></li>
	              <li class="breadcrumb-item active"></li>
	            </ol>
	          </div>
	        </div>
	      </div><!-- /.container-fluid -->
	    </section>

<section >
    <div class="container-fluid" >
        <div class="row">
            <div class="col-md-12" >
                <div class="card card-success">
                    
                    <div class="card-body p-0">
                   
                        <header>
    <div align="center">
  <!--  <img class="manImg" src="../img/logo2.jpg"></img> -->
    </div>    
                         <!--   <h1 >Registro De Clientes</h1> -->                 
                                
                         <section class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-4">
	          <div class="col-sm-12">
	            <h1>
					<button id="button-crear" type="button" data-toggle="modal" data-target="#crearcliente" class="btn bg-gradient-success ml-2">Registrar Cliente</button>					
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
	                                   
                        </header>  
                        <div class="card-body p-0 table-responsive mt-2">
                            <table class="table table-hover text-nowrap">
                            <thead class="table-success">
                            <tr>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>C.I</th>              
                                <th>Datos</th>
                            </tr>
                            </thead>
                            <tbody class="table-active" id="clientes">                         
                            </tbody>
                            </table>
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
 <script src="../js/Carrito.js"></script>
 <script src="../js/Cliente.js"></script>
 
