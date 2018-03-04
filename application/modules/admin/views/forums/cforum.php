<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title"></div>
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
              <?php if(isset($_POST['button_createForum']))
                {
                $name = $_POST['forum_name'];
                $description = $_POST['forum_description'];
                $type = $_POST['forum_type'];
                $category = $_POST['forum_cat'];
                $this->admin_model->createForums($name, $description, $type, $category);
                echo '

                <div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Forums create with existed
                </div>

                ';
                }

              ?>
                <div class="white-box">
                    <h3 class="box-title m-b-0"><i class="fas fa-plus-circle fa-fw"></i>Forum create</h3>
                    <p class="text-muted m-b-30 font-13"></p>
                    <form class="form-horizontal" method="post" action="">
                        <div class="form-group">
                            <label class="col-md-12">Name</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Name" required="" name="forum_name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-12">Enter a brief description of the forum</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" placeholder="Enter a brief description of the forum" required="" name="forum_description">
                                <span class="help-block">
                                    <small>Enter a brief description of the forum.</small>
                                </span>
                            </div>
                        </div>
<!--
                        <div class="form-group">
                            <label class="col-sm-12">Icon Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" placeholder="IconName.jpg or IconName.png" required="" name="forum_icon">
                            </div>
                        </div>
-->
                        <div class="form-group">
                            <label class="col-sm-12">Type</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="forum_type">
                                    <option value="1">Everyone</option>
                                    <option value="2">STAFF</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-12">Category</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="forum_cat">
                                <?php foreach($this->admin_model->getCategory()->result() as $categ) { ?>
                                    <option value="<?= $categ->id ?>"><?= $categ->category ?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="button_createForum"><i class="fas fa-pencil-square-o"></i> Create</button>

                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</div>
