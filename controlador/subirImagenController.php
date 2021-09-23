<?php 
	
	if (is_array($_FILES) && count($_FILES)>0) {
		if (move_uploaded_file($_FILES["f"]["tmp_name"],"../img/lab/".$_FILES["f"]["name"])) {
			echo 0;
		}		
	}
	/*if ($_POST['funcion']=='subir_logo') {
		/*if (($_FILES['subirimg']['type']=='image/jpeg')||($_FILES['subirimg']['type']=='image/png')||($_FILES['subirimg']['type']=='image/gif')) {
			$nombre=uniqid().'-'.$_FILES['subirimg']['name'];
			$ruta='../img/lab/'.$nombre;
			if (move_uploaded_file($_FILES['subirimg']['tmp_name'],$ruta)) {
				echo 1;
			}
										
		}		
		echo "haber que pasa";
	}*/

 ?>