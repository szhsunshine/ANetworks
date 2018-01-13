<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
              <?= $this->lang->line('version_gv_add_1') ?>
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
          '. $this->lang->line('gvadd_success') .'
      </div>

      ';
      }

    ?>

    <form role="form" method="post">
        <div class="form-group">
            <label><?= $this->lang->line('version_gv_add') ?></label>
            <input class="form-control" name="version">
        </div>
      <center>
        <button type="submit" class="btn btn-success" name="addversion"><?= $this->lang->line('version_button_add') ?></button>
      </center>
    </form>
