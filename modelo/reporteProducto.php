<?php 
include_once 'Venta.php';		
		function getHtml($nombre_producto,$fecha_inicial,$fecha_final){
			$venta=new Venta();							
			$venta->reporte_producto($nombre_producto,$fecha_inicial,$fecha_final);	
			$plantilla='  
				<body>
					<header class="clearfix">
						<div id="company" class="clearfix">
							<div id="negocio">
								REPORTE PRODUCTO
								CBBA-BOLIVIA
							</div>
							
							<div>
								
							</div>				
						</div>
						<p> 
						<img src="../img/1.png" align="right">
                           </p>
											
					</header>
					<main>
						<table>
							<thead>
								<tr>
									<th class="service">Nombre del Cliente</th>
									<th class="service">Producto</th>
									<th class="service">Cantidad</th>
									<th class="service">Precio</th>
									<th class="service">Fecha</th>
									<th class="service">Total</th>							
								</tr>
							</thead>
							<tbody>';							
							foreach ($venta->objetos as $objeto) {
								$plantilla.='<tr>
									<td class="servic">'.$objeto->cliente.'</td>
									<td class="servic">'.$objeto->medicamento.'</td>
									<td class="servic">'.$objeto->cantidad.'</td>
									<td class="servic">'.$objeto->precio.'</td>
									<td class="servic">'.$objeto->fecha.'</td>
									<td class="servic">'.$objeto->subtotal.'</td>							
								</tr>';
							}
							$total_producto=new Venta();	
							$total_producto->reporte_producto1($nombre_producto,$fecha_inicial,$fecha_final);
							foreach ($total_producto->objetos as $objeto) {														
								$plantilla.='  									
									<tr>
										<td colspan="5" class="grand total">TOTAL</td>
										<td class="grand total">Bs. '.$objeto->subtotal.'</td>
                                    </tr>';	
                                    
							}									
													
							
							$plantilla.='					 
								</tbody>
							</table>					
					</main>
					<footer>
						MARKETPET
					</footer>
				</body>
			';
			return $plantilla;
		}		
			
 ?>