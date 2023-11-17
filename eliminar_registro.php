<?php
require_once('conexion.php');

// Obtiene el ID de versión enviado a través de POST
$id = $_POST["id"];
$descripcion = $_POST["descripcion"];
$costo = $_POST["costo"];

// Verifica si existe la versión de auto con el ID proporcionado
$sqlBuscaVersion = "SELECT * FROM CATEGORIA_MULTAS WHERE id_CATEGORIA_MULTAS = '$id'";
$resultBuscaVersion = $conn->query($sqlBuscaVersion);

if ($resultBuscaVersion->num_rows > 0) {
  // Si existe una relación en la tabla Marca_Autos, muestra un mensaje de error y no elimina la versión de auto
  $sqlMarcaAuto = "SELECT * FROM CATEGORIA_MULTAS WHERE CATEGORIA_MULTAS_id_CATEGORIA_MULTAS='$id'";
  $resultMarcaAuto = $conn->query($sqlMarcaAuto);
}
  if ($resultMarcaAuto->num_rows > 0) {
    $mensaje = "Error: no se puede eliminar porque existen relaciones en la tabla Marca_Autos";
  } else {
    // Si no hay relaciones en la tabla CATEGORIA_MULTAS, elimina la versión de multa
    $sqlEliminaVersion = "DELETE FROM CATEGORIA_MULTAS WHERE id_CATEGORIA_MULTAS='$id'";
  }

if ($resultBuscaVersion->num_rows > 0) {
    // Si no hay relaciones en la tabla Marca_Autos, elimina la versión de auto
    $sqlEliminaVersion = "DELETE FROM CATEGORIA_MULTAS WHERE id_CATEGORIA_MULTAS='$id'";

    if ($conn->query($sqlEliminaVersion) === TRUE) {
      $mensaje = "La versión de auto fue eliminada correctamente";
    } else {
      $mensaje = "Error al eliminar la versión de auto: " . $conn->Error;
    }
  }
 else {
  // Si no existe la versión de auto, muestra un mensaje de error
  $mensaje = "No existe categoria de multa con ese ID";
}
?>