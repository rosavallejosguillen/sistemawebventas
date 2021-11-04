$(document).ready(function() {
  $('.select2').select2();
  $('#confecha').hide()
  rellenar_producto();
  let expresion='mostrar_con_fecha';  
     
     if (expresion=='mostrar_con_fecha') {
        let funcion="reporte1"
        $('#form-fecha').submit(e=>{
            $("#tabla_venta").dataTable().fnDestroy();//sirver para actualizar el datatable          
            let fecha_ini=$('#fecha_inicio').val();
            let fecha_fin=$('#fecha_final').val();              
              $.post('../controlador/VentaController.php',{funcion,fecha_ini,fecha_fin},(response)=>{
                    /*  console.log(response);*/
              });
              e.preventDefault();
              
              let  datatable =$('#tabla_venta').DataTable( {
                "ajax":{
                "url":"../controlador/VentaController.php",
                "method":"POST",
                "data":{funcion:funcion,fecha_ini,fecha_fin}
                },
                "columns": [
                { "data": "id_venta" },
                { "data": "fecha" },
                        { "data": "cliente" },
                        { "data": "dni" },
                        { "data": "total" },
                        { "data": "vendedor" },
                        /*{ "defaultContent": `
                                             <button class="ver btn btn-success" type="button" data-toggle="modal" data-target="#vista_venta"><i class="fas fa-search"></i></button>
                                             `}*/
                    ],
                    "language":espanol                    
                } );   
                $('#form-fecha').trigger('reset');    
               // console.log(fecha_ini,fecha_fin);
          $('#form-fecha').on('click','.imprimir_reporte', function() {        
                 
                  //console.log(fecha_ini,fecha_fin);
               $.post('../controlador/ReporteController.php',{fecha_ini,fecha_fin},(response)=> {
         //         console.log(response);
                  window.open('../pdf/pdf-reporte/pdf-'+fecha_ini+'.pdf','_blank');
                  //window.open('../pdf/pdf-'+id+'.pdf','_blank');
              });  
         });       
        });

         
     }  
     //FUNCION PARAEL REPORTE POR PRODUCTO
            funcion="reporte_producto"
            $('#form-fecha_producto').submit(e=>{
            let fecha_ini=$('#fecha_inicio_prod').val();
            let fecha_fin=$('#fecha_final_prod').val();    
            let nombre_producto=$('#nombre_producto').val();                    
              $.post('../controlador/VentaController.php',{funcion,nombre_producto,fecha_ini,fecha_fin},(response)=>{
                  if (response=='[]') {
                     Swal.fire({
                        icon:'error',
                        title:'Oops.. ',
                        text:'No hay Productos,en las fechas seleccionadas!'
                      }).then(function(){
                        location.href='../vista/adm_consultasprod.php';
                      });
                  }
              });
              e.preventDefault();
              $("#tabla_venta_productos").dataTable().fnDestroy();//sirver para actualizar el datatable
             
              let  datatable =$('#tabla_venta_productos').DataTable( {
                "ajax":{
                "url":"../controlador/VentaController.php",
                "method":"POST",
                "data":{funcion:funcion,nombre_producto,fecha_ini,fecha_fin}
                },
                "columns": [
                        { "data": "cliente" },
                        { "data": "medicamento" },
                        { "data": "cantidad" }, 
                        { "data": "precio" },
                        { "data": "fecha" },
                        { "data": "subtotal" },
                        /*{ "defaultContent": `
                                             <button class="ver btn btn-success" type="button" data-toggle="modal" data-target="#vista_venta"><i class="fas fa-search"></i></button>
                                             `}*/
                    ],
                    "language":espanol                    
                } );   
                $('#form-fecha_producto').trigger('reset');  
              $('#form-fecha_producto').on('click','.imprimir_reporte_producto', function() {                                        
                 $.post('../controlador/ReporteProductoController.php',{nombre_producto,fecha_ini,fecha_fin},(response)=> {
                    console.log(response);
                    window.open('../pdf/pdf-reporteProducto/pdf-'+nombre_producto+'.pdf','_blank');
                    //window.open('../pdf/pdf-'+id+'.pdf','_blank');
                });  
              });                   
        });
    
    function rellenar_producto(){
    let funcion="rellenar_productos";
    $.post('../controlador/VentaController.php',{funcion},(response)=>{
      console.log(response);
   const productos=JSON.parse(response);
      let template='';
      productos.forEach(producto =>{
        template+=` 
          <option value="${producto.nombre}">${producto.nombre}</option>
        `;
      })
      $('#nombre_producto').html(template);
    })
  }
    
});

let espanol={
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar MENU registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del START al END de un total de TOTAL registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de MAX registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    },
    "buttons": {
        "copy": "Copiar",
        "colvis": "Visibilidad"
    }
};