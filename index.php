<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MENSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="saveTask.php" method="POST">
          <div class="form-group">
            <input type="text" name="pais" class="form-control" placeholder="Pais" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="estado" class="form-control" placeholder="Estado" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="ciudad" class="form-control" placeholder="Ciudad" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="domicilio" class="form-control" placeholder="Domicilio" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="contacto" class="form-control" placeholder="Contacto" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="codigopostal" class="form-control" placeholder="Codigo Postal" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="correo" class="form-control" placeholder="Correo" autofocus>
          </div>

          <input type="submit" name="saveTask" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Id Sucursal</th>
            <th>Pais</th>
            <th>Estado</th>
            <th>Ciudad</th>
            <th>Domicilio</th>
            <th>Contacto</th>
            <th>Codigo Postal</th>
            <th>Correo</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM sucursal";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['pais']; ?></td>
            <td><?php echo $row['estado']; ?></td>
            <td><?php echo $row['ciudad']; ?></td>
            <td><?php echo $row['domicilio']; ?></td>
            <td><?php echo $row['contacto']; ?></td>
            <td><?php echo $row['codigopostal']; ?></td>
            <td><?php echo $row['correo']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="deleteTask.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>