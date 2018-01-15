<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?= $this->lang->line('user_head') ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-newspaper-o fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?= $this->admin_model->getNews(); ?></div>
                            <div><?= $this->lang->line('news_published') ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

  <div class="col-lg-12">
    <?php if(isset($_POST['deleteUser']))
      {
      $id = $_POST['id'];
      $this->admin_model->userDelete($id);
      echo '

      <div class="alert alert-info alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          '. $this->lang->line('user_deleted') .'
      </div>

      ';
      }

    ?>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
              <td> Username </td>
              <td> Email </td>
              <td> Last login </td>
              <td> Register in </td>
              <td> Post </td>
            <?php foreach($this->admin_model->getUsersDates()->result() as $users) { ?>
                <tr>
                    <td><?= $users->username ?></td>
                    <td><?= $users->email ?></td>
                    <td><?= date('Y-m-d', $users->last_login); ?></td>
                    <td><?= date('Y-m-d', $users->registered); ?></td>
                    <td><?= $users->post ?></td>
                    <td><a href=""> <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i> </a> </td>
                    <form method="post" action="">
                    <input type="hidden" name="id" value="<?= $users->id ?>" />
                    <td> <button class="btn btn-warning" type="submit" name="deleteUser"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
                    </form>

                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- /.table-responsive -->

  </div>
