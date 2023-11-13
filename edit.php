<?php
include("db.php");
$pais = '';
$estado = '';
$ciudad = '';
$domicilio = '';
$contacto = '';
$codigopostal = '';
$correo = '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM sucursal WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $pais = $row['pais'];
    $estado = $row['estado'];
    $ciudad = $row['ciudad'];
    $domicilio = $row['domicilio'];
    $contacto = $row['contacto'];
    $codigopostal = $row['codigopostal'];
    $correo = $row['correo'];
  
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $pais= $_POST['pais'];
  $estado = $_POST['estado'];
  $ciudad = $_POST['ciudad'];
  $domicilio = $_POST['domicilio'];
  $contacto = $_POST['contacto'];
  $codigopostal = $_POST['codigopostal'];
  $correo = $_POST['correo'];
  

  $query = "UPDATE sucursal set pais = '$pais', estado = '$estado', ciudad = '$ciudad', domicilio = '$domicilio', contacto = '$contacto', codigopostal = '$codigopostal', correo = '$correo' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Actualizado con Exito';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="pais" type="text" class="form-control" value="<?php echo $pais; ?>" placeholder="Actualizar pais">
        </div>
        <div class="form-group">
          <input name="estado" type="text" class="form-control" value="<?php echo $estado; ?>" placeholder="Actualizar estado">
        </div>
        <div class="form-group">
          <input name="ciudad" type="text" class="form-control" value="<?php echo $ciudad; ?>" placeholder="Actualizar ciudad">
        </div>
        <div class="form-group">
          <input name="domicilio" type="text" class="form-control" value="<?php echo $domicilio; ?>" placeholder="Actualizar domicilio">
        </div>
        <div class="form-group">
          <input name="contacto" type="text" class="form-control" value="<?php echo $contacto; ?>" placeholder="Actualizar contacto">
        </div>
        <div class="form-group">
          <input name="codigopostal" type="text" class="form-control" value="<?php echo $codigopostal; ?>" placeholder="Actualizar codigopostal">
        </div>
        <div class="form-group">
          <input name="correo" type="text" class="form-control" value="<?php echo $correo; ?>" placeholder="Actualizar correo">
        </div>
  
        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>