$(document).ready(function() {
	$('#cat-carrito').show();
	buscar_producto();
	mostrar_lotes_riesgo();
	function buscar_producto(consulta){
		funcion='buscar';
		$.post('../controlador/ProductoController.php',{consulta,funcion},(response)=>{
			const productos =JSON.parse(response);
			let template='';
			productos.forEach(producto =>{
				template+=` 
			<tr prodId="${producto.id}" prodStock="${producto.stock}" prodNombre="${producto.nombre}" prodPrecio="${producto.precio}"prodConcentracion="${producto.concentracion}"prodAdicional="${producto.adicional}"prodLaboratorio="${producto.laboratorio_id}"prodTipo="${producto.tipo_id}"prodPresentacion="${producto.presentacion_id}"prodAvatar="${producto.avatar}" >
						<td>${producto.id}</td>
						<td>${producto.stock}</td>
						<td>${producto.nombre}</td>	
						<td>${producto.precio}</td>	
						<td>${producto.concentracion}</td>	
						<td>${producto.adicional}</td>	
						<td>${producto.laboratorio}</td>	
						<td>${producto.tipo}</td>	
						<td>${producto.presentacion}</td>
						<td>								                    
			                  <button class="agregar-carrito btn btn-sm btn-primary" >
			                      Agregar a la bolsa
			                    </button>			                   
						</td>
					</tr>
			
			
			
					<!-- 	<div class="card bg-light">
                			<div class="card-header text-muted border-bottom-0">
                  				<i class="fas fa-lg fa-cubes mr-1"></i>${producto.stock}
                			</div>
                			<div class="card-body pt-0">
                  				<div class="row">
                    				<div class="col-7">
                    					<h2 class="lead">Codigo: <b>${producto.id}</b></h2>
                      					<h2 class="lead"><b>${producto.nombre}</b></h2>
                      					<h4 class="lead"><b><i class="fas fa-lg fa-dollar-sign mr-1"></i>${producto.precio}</b></h4>
					                      <ul class="ml-4 mb-0 fa-ul text-muted">
					                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-mortar-pestle"></i></span> Concetracion : ${producto.concentracion}</li>
					                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-prescription-bottle-alt"></i></span> Adicional: ${producto.adicional}</li>
					                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-flask"></i></span> Laboratorio: ${producto.laboratorio}</li>
					                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-copyright"></i></span> Tipo: ${producto.tipo}</li>
					                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-pills"></i></span> Presentacion: ${producto.presentacion}</li>
					                      </ul>
                   				</div>
                   				<div class="col-5 text-center">
                      				<img src="${producto.avatar}" alt="" class="img-circle img-fluid">
                    			</div> 
                  			</div>-->
                	
				`;
			});
			$('#productos').html(template);
		});
	}
	$(document).on('keyup','#buscar-producto',function(){
		let	valor=$(this).val();
		if (valor!="") {
			buscar_producto(valor);
		}
		else{
			buscar_producto();
		}
	});
	function mostrar_lotes_riesgo() {
		funcion="buscar";
		$.post('../controlador/LoteController.php', {funcion},(response)=> {
			const lotes=JSON.parse(response);
			let template='';
			lotes.forEach(lote =>{
				if (lote.estado=='warning') {
					template+=` 
				<tr class="table-warning">
					<td>${lote.id}</td>
					<td>${lote.nombre}</td>
					<td>${lote.stock}</td>
					<td>${lote.laboratorio}</td>
					<td>${lote.presentacion}</td>
					<td>${lote.proveedor}</td>
					<td>${lote.mes}</td>
					<td>${lote.dia}</td>
				</tr>
				`;
				}
				if (lote.estado=='danger') {
					template+=` 
				<tr class="table-danger">
					<td>${lote.id}</td>
					<td>${lote.nombre}</td>
					<td>${lote.stock}</td>
					<td>${lote.laboratorio}</td>
					<td>${lote.presentacion}</td>
					<td>${lote.proveedor}</td>
					<td>${lote.mes}</td>
					<td>${lote.dia}</td>
				</tr>
				`;
				}				
			});
			$('#lotes').html(template);
		});
	}
});