<?php
require_once('conexion.php');

// Recibir los datos del formulario
$id = $_POST["id"];
$descripcion = $_POST["descripcion"];
$costo = $_POST["costo"];

// Consulta SQL para actualizar los datos
$sql = "SELECT * FROM CATEGORIA_MULTAS WHERE id_CATEGORIA_MULTAS = '$id'";
$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
  echo "Los datos se actualizaron correctamente";
} else {
  echo "Error al actualizar los datos: " . $conn->error;
}

// Cerrar la conexión con la base de datos
$conn->close();
?>
