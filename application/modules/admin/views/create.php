<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
              Creando una nueva Noticia
            </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
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
          Noticia agregada con éxito
      </div>

      ';
      }

    ?>

    <form role="form" method="post">
        <div class="form-group">
            <label>Titulo</label>
            <input class="form-control" name="title">
        </div>
        <div class="form-group">
            <label>Cuerpo de noticia</label>
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
        <button type="submit" class="btn btn-success" name="add">Enviar</button>
      </center>
    </form>
