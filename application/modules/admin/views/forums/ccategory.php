<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title"></div>
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
              <?php if(isset($_POST['button_createCategory']))
                {
                $name = $_POST['forum_name'];
                $type = $_POST['forum_type'];

                $this->admin_model->createCategory($name, $type);
                echo '

                <div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Category create with existed
                </div>

                ';
                }

              ?>
                <div class="white-box">
                    <h3 class="box-title m-b-0"><i class="fas fa-plus-circle fa-fw"></i>Category create</h3>
                    <p class="text-muted m-b-30 font-13"></p>
                    <form class="form-horizontal" method="post" action="">
                     <div class="form-group">
                       <label class="col-md-12">Name</label>
                       <div class="col-md-12">
                         <input type="text" class="form-control" placeholder="Name" required="" name="forum_name">
                       </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-12">Type</label>
                      <div class="col-sm-6">
                        <select class="form-control" name="forum_type">
                          <option value="1">Everyone</option>
                          <option value="2">STAFF</option>
                        </select>
                      </div>
                    </div>

                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="button_createCategory"><i class="fas fa-pencil-square-o"></i> Create Category</button>

                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</div>
