<?php

include('db.php');

if (isset($_POST['saveTask'])) {
  $pais = $_POST['pais'];
  $estado = $_POST['estado'];
  $ciudad = $_POST['ciudad'];
  $domicilio = $_POST['domicilio'];
  $contacto = $_POST['contacto'];
  $codigopostal = $_POST['codigopostal'];
  $correo = $_POST['correo'];

  $query = "INSERT INTO sucursal(pais, estado, ciudad, domicilio, contacto, codigopostal, correo) VALUES ('$pais', '$estado', '$ciudad', '$domicilio', '$contacto', '$codigopostal', '$correo')";

  $result = mysqli_query($conn, $query);

  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Guardado Correctamente';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');
}

?>
