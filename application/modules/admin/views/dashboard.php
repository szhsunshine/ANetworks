        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?= $this->lang->line('dashboard') ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $this->admin_model->getUsers(); ?></div>
                                    <div><?= $this->lang->line('admin_tab_1') ?></div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><?= $this->lang->line('view_all_list') ?></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $this->admin_model->getAddons(); ?></div>
                                    <div><?= $this->lang->line('admin_tab_2') ?></div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><?= $this->lang->line('more_addons') ?></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $this->admin_model->getStatsForums(); ?></div>
                                    <div><?= $this->lang->line('admin_tab_3') ?></div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><?= $this->lang->line('more_post') ?></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">N/A</div>
                                    <div><?= $this->lang->line('admin_tab_4') ?></div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><?= $this->lang->line('more_support') ?></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">

                      <div class="panel-heading">
                          <i class="fa fa-bell fa-fw"></i> <?= $this->lang->line('Last_addons') ?>
                      </div>
                        <?php foreach($this->admin_model->getLastAddons()->result() as $addons) { ?>
                          <div class="col-lg-4">
                              <div class="panel panel-green">
                                  <div class="panel-heading">
                                      <div class="row">
                                          <div class="col-lg-4">
                                              <i class="fa fa-tasks fa-5x"></i>
                                          </div>
                                          <div class="col-lg-4">
                                              <h4><?= $addons->addon_name ?></h4>
                                          </div>
                                      </div>
                                  </div>
                                  <a href="<?= base_url()?>admin/addons/<?= $addons->id ?>">
                                      <div class="panel-footer">
                                          <span class="pull-left"><?= $this->lang->line('view_addoninfo') ?></span>
                                          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                          <div class="clearfix"></div>
                                      </div>
                                  </a>
                              </div>
                          </div>
                        <?php } ?>
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> <?= $this->lang->line('Notifications_Panel') ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                              <?php foreach($this->admin_model->getLogs()->result() as $logs) { ?>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-bullhorn fa-fw"></i> <?= $logs->page ?>
                                    <?= $logs->data ?>
                                    <br/>
                                    <i class="fa fa-user fa-fw"></i> <?= $logs->username ?>
                                    <span class="pull-right text-muted small"><em><?= date('Y-m-d', $logs->time);?></em>
                                    </span>
                                </a>
                              <?php } ?>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                        <!-- /.panel-footer -->
                    </div>
                    <!-- /.panel .chat-panel -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /#wrapper -->
