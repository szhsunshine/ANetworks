<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">List news</h1>
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
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?= $this->admin_model->getNews(); ?></div>
                            <div>Noticias publicadas</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

  <div class="col-lg-12">
    <?php if(isset($_POST['delete']))
      {
      $id = $_POST['id'];
      $this->admin_model->deleteNew($id);
      echo '

      <div class="alert alert-info alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          Se ha borrado la noticia de tu página web.
      </div>

      ';
      }

    ?>

    <hr>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <?php foreach($this->admin_model->getNewsDates()->result() as $new) { ?>
                <tr>
                    <td><?= $new->news_title ?></td>
                    <td><?= substr($new->news_content, 0, 50) ?></td>
                    <td><?= $new->post_date ?></td>
                    <td><a href="<?= base_url()?>admin/news/edit/<?= $new->id ?>"> <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i> </a> </td>
                    <form method="post" action="">
                    <input type="hidden" name="id" value="<?= $new->id ?>" />
                    <td> <button class="btn btn-warning" type="submit" name="delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
                    </form>

                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- /.table-responsive -->

  </div>
