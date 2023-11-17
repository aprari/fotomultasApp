<?php
	// Conexión a la base de datos utilizando PHPMyAdmin
	$host = 'localhost';
	$user = 'root';
	$password = 'lL3Qjapq[z*@mkxx';
	$database = 'fotomultas';

	$conn = mysqli_connect($host, $user, $password, $database);

	if (!$conn) {
		die('Error de conexión: ' . mysqli_connect_error());
	}

	// Validación de credenciales
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = "SELECT * FROM administradores WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn, $query);

	if (mysqli_num_rows($result) > 0) {
		echo 'success';
	} else {
		echo 'error';
	}

	mysqli_close($conn);
?>
