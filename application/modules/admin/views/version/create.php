<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
              Agregando una nueva versión para soportar
            </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <?php if(isset($_POST['addversion']))
      {
      $gv = $_POST['version'];
      $this->admin_model->addSupportedGV($gv);
      echo '

      <div class="alert alert-info alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          Version agregada con éxito
      </div>

      ';
      }

    ?>

    <form role="form" method="post">
        <div class="form-group">
            <label>Escribe el número de la versión (EX 7.3.0)</label>
            <input class="form-control" name="version">
        </div>
      <center>
        <button type="submit" class="btn btn-success" name="addversion">Añadir version</button>
      </center>
    </form>
