<?php
    session_start();
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    } else {
        $username = 'x';
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Bienvenido</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Materialize CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<!-- Mi CSS -->
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<header>
		<nav>
			<div class="nav-wrapper">
				<div class="container">
					<a href="#" class="brand-logo">Fotomultas</a>
					<a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
					<ul class="right hide-on-med-and-down">
						<li><a href="#">Inicio</a></li>
						<li><a href="#">Reportar un Problema</a></li>
						<li><a href="logout.php">Cerrar Sesión</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<ul class="sidenav" id="mobile-nav">
			<li><a href="#">Inicio</a></li>
			<li><a href="#">Reportar un Problema</a></li>
			<li><a href="logout.php">Cerrar Sesión</a></li>
		</ul>
	</header>
	<main>
		<div class="container">
    <h1>Bienvenido <?php echo $username; ?>!</h1>
			<p>Gracias por iniciar sesión en nuestra aplicación.</p>
		</div>
	</main>
	<footer>
		<div class="container">
			<p>&copy; 2023 Fotomultas. Todos los derechos reservados.</p>
		</div>
	</footer>
	<!-- Materialize JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<!-- Mi JS -->
	<script src="js/dashboard.js"></script>
</body>
</html>
