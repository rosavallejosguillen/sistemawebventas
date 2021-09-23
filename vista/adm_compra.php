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
<div class="modal fade" id="crearcliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card card-success">
                <div class="card-heade">
                    <h3 class="card-title"></h3>
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
                            <input id="buscar-cliente" type="text" class="form-control float-left" placeholder="Ingrese Nombre">
                            <div class="input-group-append">
                                <button class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
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
                            <button type="submit" class="btn bg-gradient-primary float-right m-1">Guardar</button>
                            
                            <button type="button" data-dismiss="modal" class="btn bg-gradient-primary    float-right m-1">Cerrar</button>
                        </div>
                    </form>
                    
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
   <!-- <img class="manImg" src="../img/2.png"></img> -->
    </div>    
                            <h1 >Formulario de Venta</h1>                 
                         <!--   <div class="datos_cp">                                                      
                                <div class="form-group row">
                                    <span>Cliente :</span>                              
                                    <div class="input-group-append col-md-6">
                                        <input type="text" class="form-control" id="cliente" placeholder="" disabled>
                                        <div class="form-group ml-2 col-md-4">
                                        </div>                                              
                                    </div>
                                </div>           
                                                     
                                <div class="form-group row ">
                                    <span col-md-2>CI:  </span>
                                    <div class="input-group-append col-md-4">
                                        <input type="text" class="form-control" id="dni" placeholder="" disabled>                                       
                                    </div>
                                </div>
-->
                                <div class="form-group row">
                                    <span>usuario: </span>
                                    <h1><?php echo $_SESSION['nombre_us'];?></h1>    
                                    <div class="row">
                                </div>   
                                </div>
                            </div>          
                                <div class="col-md-12">
                                    <div class="card card-default"fa-align-center>
                                        <div class="card-header"> 
                                                    <span class="info-box-number" id="descuento" ></span>
                                         <!--           <img class="manImg" src="../img/1.png"></img> -->
                                            <label for=""class=>TOTAL</label>
                                                    <span class="info-box-number" id="total">12</span>
                                                    <label class=>BS</label>
                                                </div>   
                                        </div>                
                                </div>
                        </header>  
                        <div id="cp"class="card-body p-0">
                            <table class="compra table  table table-primary "style="width:100">
                                <thead class='table-success'>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Stock</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">sabor</th>
                                        <th scope="col">mascota</th>
                                        <th scope="col">empresa</th>
                                        <th scope="col">Presentacion</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody id="lista-compra" class='table-active'>
                                    
                                </tbody>
                            </table>
                        </div> 
                        <div class="row justify-content-between">
                            <div class="col-md-4 mb-2">
                                <a href="../vista/adm_catalogo.php" class="btn btn-success btn-block">Volver al inventario</a>
                            </div>
                            <div class="col-xs-12 col-md-4">
                            
                                    <button class="btn btn-success btn-block" type="button" data-toggle="modal" data-target="#crearcliente">Registrar Cliente</button>
                            
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <a href="#" class="btn btn-success btn-block" id="procesar-compra">Realizar Venta</a>
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
 <script src="../js/Carrito.js"></script>
 <script src="../js/Cliente.js"></script>
 
