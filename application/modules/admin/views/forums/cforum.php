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

                if ($_POST['status'] == 'forum')
                {
                  $subforum = $_POST['forum_sub1'];
                  $type = $_POST['forum_type1'];
                  $category = $_POST['forum_cat1'];
                } else {

                    $subforum = $_POST['forum_sub2'];
                    $type = $_POST['forum_type2'];
                    $category = $_POST['forum_cat2'];
                }
                $this->admin_model->createForums($name, $description, $type, $category, $subforum);
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

                    <div class="form-group">
                      <label class="col-sm-12">Forum or Subforum</label>
                      <div class="col-sm-6">
                        <select class="form-control" id="status" name="status" onChange="mostrar(this.value);">
                          <option>Select one</option>
                          <option value="forum">Forum</option>
                          <option value="subforum">Subforum</option>
                        </select>
                      </div>
                    </div>

                    <div id="forum" style="display: none;">
                        <div class="form-group">
                            <label class="col-sm-12">Forum</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="forum_sub1">
                                    <option value="1">Forum</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-12">Type</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="forum_type1">
                                    <option value="1">Everyone</option>
                                    <option value="2">STAFF</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-12">Category</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="forum_cat1">
                                <?php foreach($this->admin_model->getForumsList()->result() as $categ) { ?>
                                    <option value="<?= $categ->id ?>"><?= $categ->category ?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>

                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="button_createForum"><i class="fas fa-pencil-square-o"></i> Create</button>

                  </div>


                  <div id="subforum" style="display: none;">
                      <div class="form-group">
                          <label class="col-sm-12">Subforum</label>
                          <div class="col-sm-6">
                              <select class="form-control" name="forum_sub2">
                                  <option value="2">Subforum</option>
                              </select>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-sm-12">Type</label>
                          <div class="col-sm-6">
                              <select class="form-control" name="forum_type2">
                                  <option value="1">Everyone</option>
                                  <option value="2">STAFF</option>
                              </select>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-sm-12">Category</label>
                          <div class="col-sm-6">
                              <select class="form-control" name="forum_cat2">
                              <?php foreach($this->admin_model->getCategory()->result() as $subcateg) { ?>
                                  <option value="<?= $subcateg->id ?>"><?= $subcateg->category ?></option>
                              <?php } ?>
                              </select>
                          </div>
                      </div>

                              <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="button_createForum"><i class="fas fa-pencil-square-o"></i> Create</button>

                </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</div>
