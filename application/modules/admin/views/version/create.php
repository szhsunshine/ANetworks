<!-- ============================================================== -->
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title"></div>
        <!-- /.row -->
        <!-- ============================================================== -->
        <!-- Different data widgets -->
        <!-- ============================================================== -->
        <!--/.row -->

<div class="row">
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

</div>
<!--/.row -->
</div>
<!-- /.container-fluid -->
