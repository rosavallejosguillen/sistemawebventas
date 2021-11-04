<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/css/all.min.css">
</head>
<?php 
	session_start();
	if (!empty($_SESSION['us_tipo'])) {
		header('Location:controlador/LoginController.php');
	}
	else{
	session_destroy();	
 ?>
<body background="img/114.jpg">
	<img class="wave" src="img/104.jpg">
	<div class="contenedor">
		<div class="img">		
		</div>
		<div class="contenido-login">
			<form action="controlador/LoginController.php" method="post">
				<img src="img/.png" alt=""> 
				<h2>SISTEMA</h2>
				<div class="input-div dni">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div class="W">
						<h5>Usuario</h5>
						<input type="text" name="user" class="input">
					</div>
				</div>
				<div class="input-div" pass>
					<div class="i">
						<i class="fas fa-lock"></i>
					</div>
					<div class="div">
						<h5>Contraseña</h5>
						<input type="password" name="pass" class="input">
					</div>
				</div>				
				<input type="submit" class="btn" value="Iniciar">
			</form>
		</div>
	</div>
	
</body>
<script src="js/login.js"></script>
</html>
<?php 
}
 ?>