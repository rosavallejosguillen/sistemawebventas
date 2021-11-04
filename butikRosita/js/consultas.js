$(document).ready(function(){
	let funcion;
	venta_mes();
	producto_mas_vendido();
	async function venta_mes(){
		funcion='venta_mes';
		let array=['','','','','','','','','','','','']
		const response= await fetch('../controlador/VentaController.php',{
			method:'POST',
			headers:{'Content-Type':'application/x-www-form-urlencoded'},
			body:'funcion='+funcion
		}).then(function(response){
			return response.json();
		}).then(function(meses){
			meses.forEach(mes=>{

				if(mes.mes==1){
					array[0]=mes;

				} 
				if(mes.mes==2){
					array[1]=mes;

				} 
				if(mes.mes==3){
					array[2]=mes;

				} 
				if(mes.mes==4){
					array[3]=mes;

				} 
				if(mes.mes==5){
					array[4]=mes;

				} 
				if(mes.mes==6){
					array[5]=mes;

				} 
				if(mes.mes==7){
					array[6]=mes;

				} 
				if(mes.mes==8){
					array[7]=mes;

				} 
				if(mes.mes==9){
					array[8]=mes;

				} 
					if(mes.mes==10){
					array[9]=mes;

				} 
					if(mes.mes==11){
					array[10]=mes;

				} 
					if(mes.mes==12){
					array[11]=mes;

				} 


			})
			/*console.log(meses);*/


		})
		let CanvasG1=$('#Grafico1').get(0).getContext('2d');
		let datos={
			labels:[
			'enero',
			'febrero',
			'marzo',
			'abril',
			'mayo',
			'junio',
			'julio',
			'agosto',
			'septiembre',
			'octubre',
			'noviembre',
			'diciembre',
			],
			datasets:[{
				data:[
				array[0].cantidad,
				array[1].cantidad,
				array[2].cantidad,
				array[3].cantidad,
				array[4].cantidad,
				array[5].cantidad,
				array[6].cantidad,
				array[7].cantidad,
				array[8].cantidad,
				array[9].cantidad,
				array[10].cantidad,
				array[11].cantidad,
				

				],
				backgroundColor:[
				'#932FD3',
				'#2FBDD3',
				'#D3772F',
				'#1E1B73',
				'#3E731B',
				'#731B66',
				'#6E731B',
				'#731B62',
				'#C1EB77',
				'#7D8967',
				'#677E89',
				'#6A8967',
				]
			}]
		}
		let opciones={
          maintainAspectRatio:false,
          responsive:true,
		}

		/*graficar*/
		let G1 = new Chart(CanvasG1,{
			type:'polarArea',
			data:datos,
			options:opciones,
		})
	}
})
	async function producto_mas_vendido(){
		funcion='producto_mas_vendido';
		let lista=['','','','','','','','','','']
		const response= await fetch('../controlador/VentaController.php',{
			method:'POST',
			headers:{'Content-Type':'application/x-www-form-urlencoded'},
			body:'funcion='+funcion
		}).then(function(response){
			return response.json();
		}).then(function(productos){
			let i=0;
			productos.forEach(producto => {
				lista[i]=producto;
				i++;
			});
		})

		let CanvasG2=$('#Grafico4').get(0).getContext('2d');
		
		let datos={
			labels:[
				'Mes diciembre'
			],
			datasets:[
				{
					label :lista[0].nombre+lista[0].concentracion+lista[0].adicional,
					backgroundColor :'black',
					borderColor :'black',
					pointRadius :false,
					pointColor  :'black',
					pointStrokeColor:'black',
					pointHighlightStroke:'black',
					data: [lista[0].total]
				},
				{
					label :lista[1].nombre+lista[1].concentracion+lista[1].adicional,
					backgroundColor :'blue',
					borderColor :'blue',
					pointRadius :false,
					pointColor  :'blue',
					pointStrokeColor:'blue',
					pointHighlightStroke:'blue',
					data: [lista[1].total]
				},
				{
                  label :lista[2].nombre+lista[2].concentracion+lista[2].adicional,
					backgroundColor :'red',
					borderColor :'red',
					pointRadius :false,
					pointColor  :'red',
					pointStrokeColor:'red',
					pointHighlightStroke:'red',
					data: [lista[2].total]
				},
				{
                  label :lista[3].nombre+lista[3].concentracion+lista[3].adicional,
					backgroundColor :'green',
					borderColor :'green',
					pointRadius :false,
					pointColor  :'green',
					pointStrokeColor:'green',
					pointHighlightStroke:'green',
					data: [lista[3].total]
				},
				{
                  label :lista[4].nombre+lista[4].concentracion+lista[4].adicional,
					backgroundColor :'orange',
					borderColor :'orange',
					pointRadius :false,
					pointColor  :'orange',
					pointStrokeColor:'orange',
					pointHighlightStroke:'orange',
					data: [lista[4].total]
				},
				{
                  label :lista[5].nombre+lista[5].concentracion+lista[5].adicional,
					backgroundColor :'#67896E',
					borderColor :'#67896E',
					pointRadius :false,
					pointColor  :'#67896E',
					pointStrokeColor:'#67896E',
					pointHighlightStroke:'#67896E',
					data: [lista[5].total]
				},
				
				{
                  label :lista[6].nombre+lista[6].concentracion+lista[6].adicional,
					backgroundColor :'#676D89',
					borderColor :'#676D89',
					pointRadius :false,
					pointColor  :'#676D89',
					pointStrokeColor:'#676D89',
					pointHighlightStroke:'#676D89',
					data: [lista[6].total]
				},
				{
                  label :lista[7].nombre+lista[7].concentracion+lista[7].adicional,
					backgroundColor :'#CF3ABD',
					borderColor :'#CF3ABD',
					pointRadius :false,
					pointColor  :'#CF3ABD',
					pointStrokeColor:'#CF3ABD',
					pointHighlightStroke:'#CF3ABD',
					data: [lista[7].total]
				},
				{
                  label :lista[8].nombre+lista[8].concentracion+lista[8].adicional,
					backgroundColor :'#3ACF5C',
					borderColor :'#3ACF5C',
					pointRadius :false,
					pointColor  :'#3ACF5C',
					pointStrokeColor:'#3ACF5C',
					pointHighlightStroke:'#3ACF5C',
					data: [lista[8].total]
				},
				{
                  label :lista[9].nombre+lista[9].concentracion+lista[9].adicional,
					backgroundColor :'#3A7BCF',
					borderColor :'#3A7BCF',
					pointRadius :false,
					pointColor  :'#3A7BCF',
					pointStrokeColor:'#3A7BCF',
					pointHighlightStroke:'#3A7BCF',
					data: [lista[9].total]
				},
			]
		}

		let opciones={
			responsive:true,
			maintainAspectRatio:false,
			datasetsFill:false,

		}
		let G2 = new Chart(CanvasG2,{
			type:'bar',
			data:datos,
			options:opciones
		})
	
	}
