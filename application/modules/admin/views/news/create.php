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
    <?php if(isset($_POST['add']))
      {
      $title = $_POST['title'];
      $content = $_POST['text'];
      $author = $this->session->userdata('ac_sess_username');
      $date = $this->m_data->getTimestamp();
      $this->admin_model->createNews($title, $content, $author, $date);
      echo '

      <div class="alert alert-info alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          '. $this->lang->line('new_create_exit') .'
      </div>

      ';
      }

    ?>

    <form role="form" method="post">
        <div class="form-group">
            <label><?= $this->lang->line('news_create_title') ?></label>
            <input class="form-control" name="title">
        </div>
        <div class="form-group">
            <label><?= $this->lang->line('news_create_1') ?></label>
            <textarea class="form-control" name="text" id="editor"></textarea>
        </div>
        <script>
            ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>
      <center>
        <button type="submit" class="btn btn-success" name="add"><?= $this->lang->line('news_create_button') ?></button>
      </center>
    </form>

  </div>
</div>
