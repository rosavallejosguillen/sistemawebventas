$(document).ready(function() {
  buscar_cliente();
	var funcion='';
  var edit=false;
  function buscar_cliente(consulta){
    funcion='buscar';
    $.post('../controlador/ClienteController.php',{consulta,funcion},(response)=>{
      const clientes=JSON.parse(response);
      let template='';
      clientes.forEach(cliente => {
        template+=`$ 
          <tr clientId="${cliente.id}" clientNombre="${cliente.nombre}" clientApellido="${cliente.apellido}" clientDNI="${cliente.dni}">
            <td>${cliente.nombre}</td>           
            <td>${cliente.apellido}</td> 
            <td>${cliente.dni}</td> 
            <td>              
         <!--     <button class="editar-cliente btn btn-sm btn-primary" title="Editar cliente" type="button" data-toggle="modal" data-target="#creartipo">
                editar
              </button>
               
               <button class="enviar-cliente btn btn-sm btn-primary" title="Enviar cliente para la venta">
                Cargar
              </button> -->  
              <button class="borrar-cliente btn btn-sm btn-success" title="Borrar cliente">
               eliminar 
              </button>             
            </td>
          </tr>
        `;
      });
      $('#clientes').html(template);
    })
  }  
  $(document).on('keyup',"#buscar-cliente",function(){
    let valor=$(this).val();
    if (valor!='') {
      buscar_cliente(valor);
    }
    else{
      buscar_cliente();
    }
  })    
	$('#form-crear-cliente').submit(e=>{
    let id_editado=$('#id_editar_cliente').val();
    let nombre_cliente=$('#nombre-cliente').val();    
    let apellido_cliente=$('#apellido-cliente').val();    
    let dni_cliente=$('#dni-cliente').val();   
    console.log(nombre_cliente,apellido_cliente,dni_cliente);
    if (edit==false) {
      funcion='crear_cliente';;
    }
    else{
      funcion='editar';
    }   
   $.post('../controlador/ClienteController.php',{id_editado,nombre_cliente,apellido_cliente,dni_cliente,funcion},(response)=>{
      if (response=='add') {
        $('#add').hide('slow');
        $('#add').show(1000);
        $('#add').hide(2000);
        $('#form-crear-cliente').trigger('reset');
       buscar_cliente();
      }
      if(response=='noadd'){
        $('#noadd').hide('slow');
        $('#noadd').show(1000);
        $('#noadd').hide(2000);
        $('#form-crear-cliente').trigger('reset');
      }
      if(response=='edit'){
        $('#edit-client').hide('slow');
        $('#edit-client').show(1000);
        $('#edit-client').hide(2000);
        $('#form-crear-cliente').trigger('reset');
        buscar_cliente();
      }
    });
    e.preventDefault();
  });	
  $(document).on('click','.editar-cliente',(e)=>{   
    const elemento=$(this)[0].activeElement.parentElement.parentElement;
    const id=$(elemento).attr('clientId'); 
    const nombre=$(elemento).attr('clientNombre'); 
    const apellido=$(elemento).attr('clientApellido'); 
    const dni=$(elemento).attr('clientDNI'); 
    $('#id_editar_cliente').val(id);
    $('#nombre-cliente').val(nombre); 
    $('#apellido-cliente').val(apellido); 
    $('#dni-cliente').val(dni);  
    edit=true;  
  })
  $(document).on('click','.borrar-cliente',(e)=>{
    funcion="borrar";
    const elemento=$(this)[0].activeElement.parentElement.parentElement;
     const id=$(elemento).attr('clientId'); 
    const nombre=$(elemento).attr('clientNombre'); 
    const apellido=$(elemento).attr('clientApellido'); 
    const dni=$(elemento).attr('clientDNI'); 
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger mr-1'
        },
        buttonsStyling: false
    })

      swalWithBootstrapButtons.fire({
          title: 'Desea Eliminar '+nombre+' '+apellido+'?',
          text: "No podras revertir esto!",
          icon:'warning',
          showCancelButton: true,
          confirmButtonText: 'Si, Borrar esto!',
          cancelButtonText: 'No, Cancelar!',
          reverseButtons: true
      }).then((result) => {
          if (result.value) {
            $.post('../controlador/ClienteController.php',{id,funcion},(response)=>{
              edit==false;
              if (response=='borrado') {
                 swalWithBootstrapButtons.fire(
                    'Borrado!',
                    'El Cliente '+ nombre+' fue borrado.',
                    'success'
                  )
                 buscar_cliente();
              }
              else{
                 swalWithBootstrapButtons.fire(
                    'Borrado!',
                    'El Cliente '+ nombre+'no fue borrado',
                    'error'
                  )
              }
            })
           
          } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire(
              'Cancelado',
              'El Cliente '+nombre+' '+apellido+' no fue borrado',
              'error'
            )
         }
      })    
  })
  $(document).on('click','.enviar-cliente',(e)=>{
    const elemento=$(this)[0].activeElement.parentElement.parentElement;
    const id=$(elemento).attr('clientId')    
    funcion='capturar_datos';
    $.post('../controlador/ClienteController.php',{funcion,id},(response)=>{
      const cliente=JSON.parse(response);
      $('#cliente').val(cliente.nombre);
      //$('#cliente-apellido').val(cliente.apellido);
      $('#dni').val(cliente.dni);          
    })
  });
});