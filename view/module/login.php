	<!doctype html>
	<html lang="en">
	<head>
		<title>Login 10</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<link rel="stylesheet" href="view/css/estilo.css">
		<link rel="stylesheet" href="view/css/rellenar.css">

		</head>
		<body class="repet" style="background-image: url(view/img/fondo.jpg);"> 
		<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-6 text-center mb-5">
						<h2 class="heading-section">Login</h2>
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-md-6 col-lg-4">
						<div class="login-wrap p-0">
					<form method="post" class="signin-form">
						<div class="form-group">
							<input type="text" class="form-control" name="TXTcc" placeholder="usuario" required>
						</div>
					<div class="form-group">
					<input id="password-field" type="password" class="form-control"  name= "contrasena" placeholder="contraseña" required>
					<span toggle="#password-field"></span>
					</div>
					<div class="form-group">
						<button type="submit" class="form-control btn btn-primary submit px-3 " value="Log in">ingresar</button>
						</div>
					</div>
				</form>



	
	</div>
				</div>
					</div>
				</div>
			</div>
		</section>
	<?php

	if(isset($_POST["TXTcc"])){

		$cc = $_POST["TXTcc"];
		$contrasena = $_POST["contrasena"];

		try {
		
		$objctr = new UserController();
		$objctr -> getVerifycc($cc,$contrasena);
		
		} catch (Exception $e) {
			print "Error de conexion ". $e -> getMessage();
		}
	}
?>

		<script src="view/js/jquery.min.js"></script>
	<script src="view/js/popper.js"></script>
	<script src="view/js/bootstrap.min.js"></script>
	

		</body>
	</html>

