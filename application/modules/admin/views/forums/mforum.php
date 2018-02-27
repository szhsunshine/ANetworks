
<!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title"></div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0"><i class="fas fa-cog fa-fw"></i>List forums</h3>
                            <p class="text-muted m-b-30"></p>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <tbody>
                                    <?php foreach($this->admin_model->getForumsList()->result() as $list) { ?>
                                        <tr>
                                            <td>
                                                <div class="col-md-12">
                                                    <input type="text" disabled class="form-control" value="<?= $list->category; ?>">
                                                </div>
                                            </td>

                                            <td>
                                                <form action="" method="post" accept-charset="utf-8">
                                                    <button name="button_deleteCategory" value="<?= $list->id ?>" type="submit" class="btn btn-danger waves-effect waves-light m-r-10"><i class="fas fa-eraser fa-fw"></i>Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.row -->
            </div>
<!-- /.container-fluid -->
</div>
