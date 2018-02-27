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
    <?php if(isset($_POST['edit']))
      {
      $title = $_POST['title'];
      $content = $_POST['text'];
      $this->admin_model->editNews($idnews, $title, $content);
      echo '

      <div class="alert alert-info alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          '. $this->lang->line('new_edit_exit') .'
      </div>

      ';
      }

    ?>

<?php foreach($this->admin_model->getNewID($idnews)->result() as $new) { ?>
    <form role="form" method="post">
        <div class="form-group">
            <label><?= $this->lang->line('news_create_title') ?></label>
            <input class="form-control" name="title" value='<?= $new->news_title ?>'>
        </div>
        <div class="form-group">
            <label><?= $this->lang->line('news_create_1') ?></label>
            <textarea class="form-control" name="text" id="editor" rows="6"><?= $new->news_content ?></textarea>
        </div>

        <script>
            ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>
      <center>
        <button type="submit" class="btn btn-success" name="edit"><?= $this->lang->line('news_edit_button') ?></button>
      </center>
    </form>


<?php } ?>

</div>

</div>
