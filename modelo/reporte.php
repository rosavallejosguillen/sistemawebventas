<?php 
include_once 'Venta.php';		
		function getHtml($fecha_inicial,$fecha_final){
			$venta=new Venta();	
			$total_fecha=new Venta();
			$total_fecha->total_fecha($fecha_inicial,$fecha_final);			
			$venta->reporte1($fecha_inicial,$fecha_final);	
			$plantilla='  
				<body>
					<header class="clearfix">
						<div id="company" class="clearfix">
							<div id="negocio">
								Reportes
								CBBA-BOLIVIA
							</div>
							<div>
				
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
									<th class="service">Codigo</th>
									<th class="service">Nombre Cliente</th>
									<th class="service">C.I</th>
									<th class="service">Fecha</th>
									<th class="service">Vendedor</th>
									<th class="service">Total</th>							
								</tr>
							</thead>
							<tbody>';
							foreach ($venta->objetos as $objeto) {
								$plantilla.='<tr>
									<td class="servic">'.$objeto->id_venta.'</td>
									<td class="servic">'.$objeto->cliente.'</td>
									<td class="servic">'.$objeto->dni.'</td>
									<td class="servic">'.$objeto->fecha.'</td>
									<td class="servic">'.$objeto->vendedor.'</td>
									<td class="servic">'.$objeto->total.'</td>							
								</tr>';
							}									
							foreach ($total_fecha->objetos as $objeto) {								
								$plantilla.='  									
									<tr>
										<td colspan="5" class="grand total">TOTAL</td>
										<td class="grand total">Bs. '.$objeto->total_fecha.'</td>
									</tr>';		
							}				
							$plantilla.='					 
								</tbody>
							</table>					
					</main>
					<footer>
						MARKET PET	
					</footer>
				</body>
			';
			return $plantilla;
		}
					
 ?>