<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">

              <?php foreach($this->admin_model->getNewID($idnews)->result() as $title) { ?>
                Estas editando | <?= $title->news_title ?>
              <?php } ?>  </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <?php if(isset($_POST['edit']))
      {
      $title = $_POST['title'];
      $content = $_POST['text'];
      $this->admin_model->editNews($idnews, $title, $content);
      echo '

      <div class="alert alert-info alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          Noticia editada con éxito.
      </div>

      ';
      }

    ?>

<?php foreach($this->admin_model->getNewID($idnews)->result() as $new) { ?>
    <form role="form" method="post">
        <div class="form-group">
            <label>Titulo</label>
            <input class="form-control" name="title" value='<?= $new->news_title ?>'>
        </div>
        <div class="form-group">
            <label>Text area</label>
            <textarea class="form-control" name="text" rows="6"><?= $new->news_content ?></textarea>
        </div>

      <center>
        <button type="submit" class="btn btn-success" name="edit">Enviar</button>
      </center>
    </form>


<?php } ?>
