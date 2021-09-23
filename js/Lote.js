$(document).ready(function(){	
	buscar_lote();
		
	function buscar_lote(consulta){
		funcion='buscar';
		$.post('../controlador/LoteController.php',{consulta,funcion},(response)=>{
			const lotes =JSON.parse(response);
			let template='';
			lotes.forEach(lote =>{
				template+=` 
				<tr loteId="${lote.id}" loteStock="${lote.stock}">
				<td>${lote.id}</td>
				<td>${lote.stock}</td>
				<td>${lote.concentracion}</td>
				<td>${lote.laboratorio}</td>
				<td>${lote.tipo}</td>
				<td>${lote.presentacion}</td>
				<td>${lote.vencimiento}</td>
				<td>${lote.proveedor}</td>
			<!--	<td>${lote.mes}</td>
				<td>${lote.dia}</td> 
				<td>
					<img src="${lote.avatar}" class="img-fluid rounded" width="70" height="70">
				</td>		-->
				<td>		
								
				<button class="editar btn btn-sm btn-success" type="button" data-toggle="modal" data-target="#editarlote">
				editar
			  </button>			                   
			  <button class="borrar btn btn-sm btn-success">
				eliminar
			  </button>
				</td>
			</tr>
				`;
			});
			$('#lotes').html(template);
		});
	}
	$(document).on('keyup','#buscar-lote',function(){
		let	valor=$(this).val();
		if (valor!="") {
			buscar_lote(valor);
		}
		else{
			buscar_lote();
		}
	});
	$(document).on('click','.editar',(e)=>{
		funcion='';
		const elemento=$(this)[0].activeElement.parentElement.parentElement;
		const id=$(elemento).attr('loteId');		
		const stock=$(elemento).attr('loteStock');		
		

		$('#id_lote_prod').val(id);
		$('#stock').val(stock);
		$('#codigo_lote').html(id);
		
	});
	$('#form-editar-lote').submit(e=> {
		let id=$('#id_lote_prod').val();
		let stock=$('#stock').val();
		funcion="editar";
		$.post('../controlador/LoteController.php', {id,stock,funcion},(response)=> {
			if (response=='edit') {
				$('#edit-lote').hide('slow');
        		$('#edit-lote').show(1000);
        		$('#edit-lote').hide(2000);
        		$('#form-editar-lote').trigger('reset');        		
			}
			buscar_lote();
		});
		e.preventDefault();
	});
	$(document).on('click','.borrar',(e)=>{
		funcion="borrar";
		const elemento=$(this)[0].activeElement.parentElement.parentElement;
		const id=$(elemento).attr('loteId');			
		const swalWithBootstrapButtons = Swal.mixin({
			  customClass: {
			    confirmButton: 'btn btn-success',
			    cancelButton: 'btn btn-danger mr-1'
			  },
			  buttonsStyling: false
		})

			swalWithBootstrapButtons.fire({
				  title: 'Desea eliminar lote '+id+'?',
				  text: "No podras revertir esto!",
				  icon:"warning",				  
				  showCancelButton: true,
				  confirmButtonText: 'Si, Borrar esto!',
				  cancelButtonText: 'No, Cancelar!',
				  reverseButtons: true
			}).then((result) => {
				  if (result.value) {
				  	$.post('../controlador/LoteController.php',{id,funcion},(response)=>{				  		
				  		if (response=='borrado') {
				  			 swalWithBootstrapButtons.fire(
							      'Borrado!',
							      'El lote '+ id+' fue borrado.',
							      'success'
				    			)
				  			 buscar_lote();
				  		}
				  		else{
				  			 swalWithBootstrapButtons.fire(
							      'Borrado!',
							      'El lote '+ id+'no fue borrado por que esta siendo usado.',
							      'error'
				    			)
				  		}
				  	})
				   
				  } else if (result.dismiss === Swal.DismissReason.cancel) {
				    swalWithBootstrapButtons.fire(
				      'Cancelado',
				      'El lote '+id+' no fue borrado',
				      'error'
				    )
				 }
			})		
	})

})