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
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-xs-12">
                            <div class="white-box">
                                <h3 class="box-title"><?= $this->lang->line('admin_tab_1') ?></h3>
                                <ul class="list-inline m-t-30 p-t-10 two-part">
                                    <li><i class="fas fa-users text-info"></i></li>
                                    <li class="text-right"><span class="counter"><?= $this->admin_model->getUsers(); ?></span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-xs-12">
                            <div class="white-box">
                                <h3 class="box-title"><?= $this->lang->line('admin_tab_2') ?></h3>
                                <ul class="list-inline m-t-30 p-t-10 two-part">
                                    <li><i class="fas fa-globe text-success"></i></li>
                                    <li class="text-right"><span class="counter"><?= $this->admin_model->getAddons(); ?></span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-xs-12">
                            <div class="white-box">
                                <h3 class="box-title"><?= $this->lang->line('admin_tab_3') ?></h3>
                                <ul class="list-inline m-t-30 p-t-10 two-part">
                                    <li><i class="fas fa-comments text-succes"></i></li>
                                    <li class="text-right"><span class=""><?= $this->admin_model->getStatsForums(); ?></span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-xs-12">
                            <div class="white-box">
                                <h3 class="box-title"><?= $this->lang->line('admin_tab_4') ?></h3>
                                <ul class="list-inline m-t-30 p-t-10 two-part">
                                    <li><i class="fas fa-support text-danger"></i></li>
                                    <li class="text-right"><span class="">N/A</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!--/.row -->
    </div>
<!-- /.container-fluid -->
