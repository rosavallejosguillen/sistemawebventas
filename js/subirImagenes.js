$(document).ready(function() {
	function subirImg(){
		var archivo=$("#subirimg").val();
		var foto=$("#subirimg")[0].files[0];
		var formData=new FormData();
		formData.append('f',foto);
		$.ajax({
			url: '../controlador/subirImagenController.php',
			type: 'POST',
			data:formData,
			contentType:false,
			processData:false,
			success:function(response){
				if (response !=0) {
					console.log("imagen pasada al archivo")
				}
				else{
					console.log("imagen no pasada al archivo")
				}
			}

		});		
		return false;	
	}
	/*$('#form-crear-laboratorio').submit(e=>{
		funcion="subir_logo";
		$('#funcion1').val(funcion);
		let foto=$("#subirimg")[0].files[0];
		let formData=new FormData($('#form-crear-laboratorio')[0]);
		formData.append('f',foto);
		$.ajax({
			url:'../controlador/subirImagenController.php',
			type:'POST',
			data:formData,
			cache:false,
			processData:false,
			contentType:false			
		}).always(function(response){
			if (response==1) {
				//console.log("se envio la imagen ala ruta indicada");
			}	
			else{
				//console.log("no se envio la imagen ala ruta indicada");
			}		
		});
		e.preventDefault();		
	});*/
	
});