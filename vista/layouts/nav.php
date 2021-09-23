  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/compra.css">
  <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="../css/datatables.css">

<!-- select2 -->
	  <link rel="stylesheet" href="../css/select2.css">
 <!-- SweetAlert2 -->
	  <link rel="stylesheet" href="../css/sweetalert2.css">

	  <!-- Font Awesome -->
	  <link rel="stylesheet" href="../css/css/all.min.css">
	  <!-- Ionicons -->
	  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	  <!-- overlayScrollbars -->
	  <link rel="stylesheet" href="../css/adminlte.min.css">
	  <!-- Google Font: Source Sans Pro -->
	  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	</head>
	<body class="hold-transition sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
	  <!-- Navbar -->
	  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
	    <!-- Left navbar links 
	    <ul class="navbar-nav">
	      <li class="nav-item">
	        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
	      </li>
          -->
        </img>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <table class="carro table table-hover text-nowrap p-0">
          	<thead class="table-success">
          		<tr>
          			<th>Codigo</th>
          			<th>Nombre</th>
          			<th>Concentracion</th>
          			<th>Adicional</th>
          			<th>Precio</th>
          			<th>Eliminar</th>
          		</tr>
          	</thead>
          	<tbody id="lista">
          		
          	</tbody>
          </table>
          <a href="#" id="procesar-pedido" class="btn btn-danger btn-block">Procesar Venta</a>
          <a href="#" id="vaciar-carrito" class="btn btn-primary btn-block">Vaciar Carrito</a>
        </div>
      </li>	    
	    </ul>
	    <!-- Right navbar links -->
	    <ul class="navbar-nav ml-auto">	
	    </ul>      
			  </li>    
			    <li class="navbar-nav ml-auto">
	            <a href="editar_datos_personales.php" class="nav-link">
	              
	              <p>
	                Datos Personales
	              </p>
	            </a>
	          </li>         
	          <li class="navbar-nav ml-auto">
	            <a href="adm_usuario.php" class="nav-link">
	              
	              <p>
	                Gestion Usuario
	              </p>
				  
	            </a>
	          
			  </li>   
			  <li ul class="navbar-nav ml-auto">
	            <a href="../controlador/Logout.php" class="nav-link"class="cerra_sesion">        
	              <p>
	                   Salir Sesion
	              </p>
				  
	            </a>
	          
			  </li>  
	  </nav>
			   
	  <!-- /.navbar -->

	  <!-- Main Sidebar Container -->
	  <aside class="main-sidebar sidebar-dark-primary elevation-4">
	    <!-- Brand Logo -->
	    <a href="../vista/adm_catalogo.php" class="brand-link">
	      <img src="../img/logo.jpg"
	           alt="AdminLTE Logo"
	           class="brand-image img-circle elevation-2"
	           >
	      <span class="brand-text font-weight-light">.</span>
	    </a>
	    <!-- Sidebar -->
	    <div class="sidebar">
	      <!-- Sidebar user (optional)
		user-panel mt-3 pb-3 mb-3 d-flex -->
	      <div class="">
	       
		<!--  <div class="image">
	          <img id="avatar4" src="../img/41.png" class="img-circle elevation-2" alt="User Image">
	        </div>
		
		importante restaurar
		
		<div class="info">
	          <a href="#" class="d-block">
	          	<?php 
	          		echo $_SESSION['nombre_us'];
	          	 ?>  
	          </a>
	        </div>
	      </div>-->
	        

	      <!-- Sidebar Menu -->
	      <nav class="mt-2">
	        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
	          <!-- Add icons to the links using the .nav-icon class
	               with font-awesome or any other icon font library 
	          <li class="nav-header">DATOS PERSONALES</li>         
	          <li class="nav-item">
	            <a href="editar_datos_personales.php" class="nav-link">
	              
	              <p>
	                Datos Personales
	              </p>
	            </a>
	          </li>         
	          <li class="nav-item">
	            <a href="adm_usuario.php" class="nav-link">
	              
	              <p>
	                Gestion Usuario
	              </p>
				  
	            </a>
	          
			  </li>     
			  <li class="nav-item">
	            <a href="../controlador/Logout.php" class="nav-link"class="cerra_sesion">
	            
	              <p>
	                   Salir Sesion
	              </p>
				  
	            </a>
	          
			  </li>  -->
			  

	    <li class="navbar-nav ml-auto">   	 
               </li> 
	          <li class="nav-header"></li> 			  
			  <li class="nav-item">
	            <a href="#" id="procesar-pedido" class="nav-link"id="contador" class="contador badge badge-success">
	              <p>
				  Procesar Venta
				  <span id="contador" class="contador badge badge-pill badge-success">0</span>
	              </p>
	            </a>
	          </li>   
	          <li class="nav-item">
	            <a href="adm_catalogo.php" class="nav-link">
	              
	              <p>
				  Realizar pedido
	              </p>
	            </a>
	          </li> 
			  
			  <li class="nav-item">
	            <a href="adm_RegistroCliente.php" class="nav-link">
	              
	              <p>
				  Clientes
	              </p>
	            </a>
	          </li>   

			  <li class="nav-item">
	            <a href="adm_producto.php" class="nav-link">
	             
	              <p>
	                Productos
	              </p>
	            </a>
	          </li>  
			         <li class="nav-item">
	            <a href="adm_atributo.php" class="nav-link">
	              <p>
	                Gestion De Atributo
	              </p>
	            </a>
	          </li>  
	          <li class="nav-item">
	            <a href="adm_lote.php" class="nav-link">        
	              <p>
	                Gestion Lote
	              </p>
	            </a>
	          </li>  	          
	           <li class="nav-item">
	            <a href="adm_proveedor.php" class="nav-link">     
	              <p>
	                Gestion Proveedor
	              </p>
	            </a>
	          </li>             
		<!--	  <li class="nav-item">
	            <a href="adm_venta.php" class="nav-link">
	              
	              <p>
				  Reportes
	              </p>
	            </a>
	          </li>             	         
			  <li class="nav-item">
	            <a href="adm_consultas.php" class="nav-link">
	              <p>
	                 CONSULTAS DE VENTAS
	              </p>
	            </a>
	          </li>       
			  <li class="nav-item">
	            <a href="adm_consultasprod.php" class="nav-link">   
	              <p>
	                 PRODUCTOS MAS VENDIDOS
	              </p>
	            </a>
	          </li>      
			
			  <li class="nav-item">
	            <a href="adm_reporte.php" class="nav-link">   
	              <p>
	               REPORTES
	              </p>
	            </a>
	          </li>   -->
			  
	        </ul>
		
	      </nav>      
	    </div> 
	  </aside>
