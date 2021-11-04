<?php 
include_once 'Venta.php';
include_once 'VentaProducto.php';
function gethtml($id_venta){
    $venta=new Venta();
    $venta_producto=new VentaProducto();
    $venta->buscar_id($id_venta);
    $venta_producto->ver($id_venta);
    $plantilla='
    <body>
    <header class="clearfix">
        <div id="logo">
            <img src="../img/1.png" >					
        </div>
       
        <div id="" class="clearfix">
        <div id="negocio">
            COMPROBANTE DE PAGO
                
            </div>
            <div id="negocio">
            
                Market Pet
            </div>
          
            			
        </div>';
        foreach ($venta->objetos as $objeto) {
            $plantilla.='  
                <div id="project">
                    <div>
                        <span>Codigo de Venta: </span>'.$objeto->id_venta.'
                    </div>
                    <div>
                        <span>Cliente: </span>'.$objeto->cliente.'
                    </div>
                    <div>
                        <span>C.I: </span>'.$objeto->dni.'
                    </div>
                    <div>
                        <span>Fecha y Hora: </span>'.$objeto->fecha.'
                    </div>
                    <div>
                        <span>Vendedor: </span>'.$objeto->vendedor.'
                    </div>
                </div>';
        }
    $plantilla.='  
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th class="service">Producto</th>
                    <th class="service">Mascota</th>
                    <th class="service">Modelo-color</th>
                    <th class="service">Empresa</th>
                    <th class="service">Material</th>
                    <th class="service">Tipo</th>
                    <th class="service">Cantidad</th>
                    <th class="service">Precio</th>
                    <th class="service">Subtotal</th>
                </tr>
            </thead>
            <tbody>';
            foreach ($venta_producto->objetos as $objeto) {
                $plantilla.='<tr>
                    <td class="servic">'.$objeto->producto.'</td>
                    <td class="servic">'.$objeto->concentracion.'</td>
                    <td class="servic">'.$objeto->adicional.'</td>
                    <td class="servic">'.$objeto->laboratorio.'</td>
                    <td class="servic">'.$objeto->presentacion.'</td>
                    <td class="servic">'.$objeto->tipo.'</td>
                    <td class="servic">'.$objeto->cantidad.'</td>
                    <td class="servic">'.$objeto->precio.'</td>
                    <td class="servic">'.$objeto->subtotal.'</td>
                </tr>';
            }	
            $calculos=new Venta();
            $calculos->buscar_id($id_venta);
            foreach ($calculos->objetos as $objeto) {
              $iva=$objeto->total*0.13;
                $sub=$objeto->total-$iva;

                $plantilla.='  
                    
                    <tr>
                        <td colspan="8" class="grand total">TOTAL</td>
                        <td class="grand total">Bs/.'.$objeto->total.'</td>
                    </tr>';	
            }		
            $plantilla.='					 
                </tbody>
            </table>
            
                <div id="telefono">
                    GRACIAS POR SU COMPRA VUELVA PRONTO
                </div>
                <div id="telefono">
                TELEFONOS:4734371-65733620 CBBA
            </div>
    </main>
   
</body>
';
return $plantilla;
    
}
?>

