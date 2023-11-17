<?php
require_once('conexion.php');

$versionId = $_POST["id_versiones"];
$categoria = $_POST["categoria"];

$sql = "SELECT * FROM versiones_auto WHERE id_versiones='$versionId'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $response = "Error: Ya existe una categoría con ese ID.";
} else {
  $sql = "INSERT INTO versiones_auto (id_versiones, categoria) VALUES ('$versionId', '$categoria')";
  if ($conn->query($sql) === TRUE) {
    $response = "<tr><td>" . $versionId . "</td><td>" . $categoria . "</td></tr>";
  } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
  }
}


echo $response;


$conn->close();
?>