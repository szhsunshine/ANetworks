<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">

              <?php foreach($this->admin_model->getVersion($idversion)->result() as $title) { ?>
                <?= $this->lang->line('you_are_edit') ?> <?= $title->gameversion ?>
              <?php } ?>  </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <?php if(isset($_POST['edit']))
      {
      $version = $_POST['version'];
      $this->admin_model->editSupportedGV($idversion, $version);
      echo '

      <div class="alert alert-info alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          '. $this->lang->line('gvedit_success') .'
      </div>

      ';
      }

    ?>

<?php foreach($this->admin_model->getVersion($idversion)->result() as $version) { ?>
    <form role="form" method="post">
        <div class="form-group">
            <label><?= $this->lang->line('version_gv') ?></label>
            <input class="form-control" name="version" value='<?= $version->gameversion ?>'>
        </div>

      <center>
        <button type="submit" class="btn btn-success" name="edit"><?= $this->lang->line('version_button_edit') ?></button>
      </center>
    </form>


<?php } ?>
