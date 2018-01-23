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


  <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover">
          <tbody>
          <?php foreach($this->admin_model->getConfigDates()->result() as $cfg) { ?>
              <tr>
                  <td><?= $cfg->config_item ?></td>
                  <td><?= $cfg->value ?></td>
                  <td><a href="<?= base_url()?>admin/settings/edit/<?= $cfg->id_cnf ?>"> <i class="fas fa-pencil-square-o fa-2x" aria-hidden="true"></i> </a> </td>
              </tr>
          <?php } ?>
          </tbody>
      </table>
  </div>



</div>

</div>
</div>
