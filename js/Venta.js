$(document).ready(function() {
	let funcion="listar";
	$.post('../controlador/VentaController.php',{funcion},(response)=>{
		
	});
	let  datatable =$('#tabla_venta').DataTable( {
        "ajax":{
        	"url":"../controlador/VentaController.php",
        	"method":"POST",
        	"data":{funcion:funcion}
        },
        "columns": [
            { "data": "id_venta" },
            { "data": "fecha" },
            { "data": "cliente" },
            { "data": "dni" },
            { "data": "total" },
            { "data": "vendedor" }, 
            { "defaultContent": ` 
                                 <button class="ver btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#vista_venta">Reporte</button>
                              <button class="btn btn-sm btn-primary"><i ></i>modificar</button>
                              <button class="imprimir btn btn-sm btn-primary"><i ></i>comprobante</button>  
                                 `}
        ],
        "language":espanol
    } );
    // imprimir
    $('#tabla_venta tbody').on('click','.imprimir', function() {
        let datos=datatable.row($(this).parents()).data();
        let id=datos.id_venta;
        $.post('../controlador/pdfController.php',{id},(response)=>{
          console.log(response);
            window.open('../pdf/pdf-'+id+'.pdf','_blank');
        })
        
       
});
    $('#tabla_venta tbody').on('click','.ver', function() {
        let datos=datatable.row($(this).parents()).data();
        let id=datos.id_venta;
        funcion="ver";
        $('#codigo_venta').html(datos.id_venta);
        $('#fecha').html(datos.fecha);
        $('#cliente').html(datos.cliente);
        $('#dni').html(datos.dni);
        $('#vendedor').html(datos.vendedor);
        $('#total').html(datos.total);
        $.post('../controlador/VentaProductoController.php', {funcion,id}, (response)=> {
           let registros=JSON.parse(response);
           let template="";
           $('#registros').html(template);
           registros.forEach(registro =>{
            template+=` 
                <tr>
                    <td>${registro.cantidad}</td>
                    <td>${registro.precio}</td>
                    <td>${registro.producto}</td>
                    <td>${registro.concentracion}</td>
                    <td>${registro.laboratorio}</td>
                    <td>${registro.presentacion}</td>
                    <td>${registro.tipo}</td>
                    <td>${registro.subtotal}</td>
                </tr>
            `;
            $('#registros').html(template);
           });
        });
    });
});

let espanol={
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
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