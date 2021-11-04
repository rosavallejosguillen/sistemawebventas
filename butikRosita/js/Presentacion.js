 $(document).ready(function(){
	buscar_pre();
	var funcion;
	var edit=false;	
	$('#form-crear-presentacion').submit(e=>{
		let nombre_presentacion=$('#nombre-presentacion').val();
		let id_editado=$('#id_editar_pre').val();
		if (edit==false) {
			funcion='crear';
		}
		else{
			funcion='editar';
		}		
		$.post('../controlador/PresentacionController.php',{nombre_presentacion,id_editado,funcion},(response)=>{
			if (response=='add') {
				$('#add-pre').hide('slow');
				$('#add-pre').show(1000);
				$('#add-pre').hide(2000);
				$('#form-crear-presentacion').trigger('reset');
				buscar_pre();
			}
			if (response=='noadd'){
				$('#noadd-pre').hide('slow');
				$('#noadd-pre').show(1000);
				$('#noadd-pre').hide(2000);
				$('#form-crear-presentacion').trigger('reset');
			}
			if (response=='edit') {
				$('#edit-pre').hide('slow');
				$('#edit-pre').show(1000);
				$('#edit-pre').hide(2000);
				$('#form-crear-presentacion').trigger('reset');				
				buscar_pre();
			}
			edit==false;
		})
		e.preventDefault();
	});
	function buscar_pre(consulta){
		funcion='buscar';
		$.post('../controlador/PresentacionController.php',{consulta,funcion},(response)=>{
			const presentaciones=JSON.parse(response);
			let template='';
			presentaciones.forEach(presentacion => {
				template+=`$ 
					<tr preId="${presentacion.id}" preNombre="${presentacion.nombre}">
						<td>${presentacion.nombre}</td>						
						<td>							
							<button class="editar-pre btn btn-success" title="Editar Presentacion" type="button" data-toggle="modal" data-target="#crearpresentacion">
								editar
							</button>
							<button class="borrar-pre btn btn-success" title="Borrar presentacion">
							eliminar
							</button>
						</td>
					</tr>
				`;
			});
			$('#presentaciones').html(template);
		})
	}
	$(document).on('keyup',"#buscar-presentacion",function(){
		let valor=$(this).val();
		if (valor!='') {
			buscar_pre(valor);
		}
		else{
			buscar_pre();
		}
	})		
	$(document).on('click','.borrar-pre',(e)=>{
		funcion="borrar";
		const elemento=$(this)[0].activeElement.parentElement.parentElement;
		const id=$(elemento).attr('preId');	
		const nombre=$(elemento).attr('preNombre');	

		const swalWithBootstrapButtons = Swal.mixin({
			  customClass: {
			    confirmButton: 'btn btn-success',
			    cancelButton: 'btn btn-danger mr-1'
			  },
			  buttonsStyling: false
		})

			swalWithBootstrapButtons.fire({
				  title: 'Desea Eliminar '+nombre+'?',
				  text: "No podras revertir esto!",
				  icon:'warning',
				  showCancelButton: true,
				  confirmButtonText: 'Si, Borrar esto!',
				  cancelButtonText: 'No, Cancelar!',
				  reverseButtons: true
			}).then((result) => {
				  if (result.value) {
				  	$.post('../controlador/PresentacionController.php',{id,funcion},(response)=>{
				  		edit==false;
				  		if (response=='borrado') {
				  			 swalWithBootstrapButtons.fire(
							      'Borrado!',
							      'La presentacion '+ nombre+' fue borrado.',
							      'success'
				    			)
				  			 buscar_pre();
				  		}
				  		else{
				  			 swalWithBootstrapButtons.fire(
							      'Borrado!',
							      'La presentacion '+ nombre+'no fue borrado por que esta siendo usado por un producto.',
							      'error'
				    			)
				  		}
				  	})
				   
				  } else if (result.dismiss === Swal.DismissReason.cancel) {
				    swalWithBootstrapButtons.fire(
				      'Cancelado',
				      'La presentacion '+nombre+' no fue borrado',
				      'error'
				    )
				 }
			})		
	})
	$(document).on('click','.editar-pre',(e)=>{		
		const elemento=$(this)[0].activeElement.parentElement.parentElement;
		const id=$(elemento).attr('preId');	
		const nombre=$(elemento).attr('preNombre');	
		$('#id_editar_pre').val(id);
		$('#nombre-presentacion').val(nombre);	
		edit=true;	
	})


});