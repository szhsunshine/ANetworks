<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= $this->config->item('name'); ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url(); ?>assets/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/admin/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/admin/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <!-- Menu CSS -->
    <link href="<?= base_url(); ?>assets/admin/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="<?= base_url(); ?>assets/admin/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="<?= base_url(); ?>assets/admin/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="<?= base_url(); ?>assets/admin/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/admin/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- Calendar CSS -->
    <link href="<?= base_url(); ?>assets/admin/bower_components/calendar/dist/fullcalendar.css" rel="stylesheet" />
    <!-- animation CSS -->
    <link href="<?= base_url(); ?>assets/admin/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url(); ?>assets/admin/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?= base_url(); ?>assets/admin/css/colors/default.css" id="theme" rel="stylesheet">
    <!-- New editor -->

    <script src="<?= base_url() ?>assets/editor/ckeditor.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part"></div>
                <!-- /Logo -->
                <!-- Search input and Toggle icon -->
                <ul class="nav navbar-top-links navbar-left">
                    <li><a href="javascript:void(0)" class="open-close waves-effect waves-light"><i class="fas fa-bars"></i></a></li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"> <i class="fas fa-ticket-alt fa-fw"></i>
                            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                        </a>
                        <ul class="dropdown-menu mailbox animated bounceInDown">
                            <li>
                                <div class="drop-title">You have 4 new messages</div>
                            </li>
                            <li>
                                <div class="message-center">
                                    <a href="#">
                                        <div class="user-img"> <img src="<?= base_url(); ?>assets/images/profiles/" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                        <div class="mail-contnet">
                                            <h5>Vipo</h5> <span class="mail-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span> <span class="time">9:30 AM</span> </div>
                                    </a>
                                    <a href="#">
                                        <div class="user-img"> <img src="<?= base_url(); ?>assets/images/profiles/" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                        <div class="mail-contnet">
                                            <h5>Vipo</h5> <span class="mail-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span> <span class="time">9:10 AM</span> </div>
                                    </a>
                                    <a href="#">
                                        <div class="user-img"> <img src="<?= base_url(); ?>assets/images/profiles/" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                        <div class="mail-contnet">
                                            <h5>Vipo</h5> <span class="mail-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span> <span class="time">9:08 AM</span> </div>
                                    </a>
                                    <a href="#">
                                        <div class="user-img"> <img src="<?= base_url(); ?>assets/images/profiles/" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                        <div class="mail-contnet">
                                            <h5>Vipo</h5> <span class="mail-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span> <span class="time">9:02 AM</span> </div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <a class="text-center" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="fas fa-angle-right"></i> </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-messages -->
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"> <i class="far fa-bell fa-fw"></i>
                            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                        </a>
                        <ul class="dropdown-menu mailbox animated bounceInDown">
                            <li>
                                <div class="drop-title">Notifications system</div>
                            </li>
                            <li>
                                <div class="message-center">
                                    <?php foreach($this->admin_model->getLogs()->result() as $logs) { ?>
                                    <a href="#">
                                        <div class="mail-contnet">
                                            <h5><?= $logs->username ?></h5> <span class="mail-desc"><?= $logs->data ?>.</span> <span class="time"><?= date('Y-m-d', $logs->time) ?></span> </div>
                                    </a>
                                  <?php } ?>

                                </div>
                            </li>
                            <li>
                                <a class="text-center" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="fas fa-angle-right"></i> </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-messages -->
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#">
                            <b class="hidden-xs">
                                <?= $this->session->userdata('ac_sess_username'); ?>
                            </b>
                            <span class="caret"></span> </a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-text">
                                        <h4><?= $this->session->userdata('ac_sess_username'); ?></h4></div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href=""><i class="fas fa-cog text-info"></i> </a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href=""><i class="fas fa-power-off text-danger"></i> </a></li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span><span class="hide-menu">Navigation</span></h3></div>
                <div class="user-profile"></div>
                <ul class="nav" id="side-menu">
                    <li><a href="<?= base_url('admin'); ?>" class="waves-effect"><i class="fas fa-home"></i> <span class="hide-menu"><?= $this->lang->line('admin_m1') ?></span></a></li>
                    <li><a href="#" class="waves-effect"><i class="fas fa-bars fas-fw text-danger"></i> <span class="hide-menu"><?= $this->lang->line('admin_m2') ?> <span class="fas fa-arrow"></span> <span class="label label-rouded label-inverse pull-right">2</span> </span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?= base_url('admin/news/create'); ?>"><i class="fas fa-pencil-alt fas-fw"></i> <span class="hide-menu"><?= $this->lang->line('admin_m4') ?></span></a></li>
                            <li><a href="<?= base_url('admin/news'); ?>"><i class="fas fa-list fas-fw"></i> <span class="hide-menu"><?= $this->lang->line('admin_m3') ?></span></a></li>
                        </ul>
                    </li>
                    <li><a href="#" class="waves-effect"><i class="fas fa-database fas-fw text-purple"></i> <span class="hide-menu"><?= $this->lang->line('admin_m5') ?><span class="fas fa-arrow"></span> <span class="label label-rouded label-inverse pull-right">2</span> </span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?= base_url('admin/version/create'); ?>"><i class="fas fa-pencil-alt fas-fw"> </i><span class="hide-menu"><?= $this->lang->line('admin_m7') ?></span></a></li>
                            <li><a href="<?= base_url('admin/version'); ?>"><i class="fas fa-list fas-fw"></i> <span class="hide-menu"><?= $this->lang->line('admin_m6') ?></span></a></li>
                        </ul>
                    </li>
                    <li><a href="<?= base_url('admin/forums'); ?>" class="waves-effect"><i class="fas fa-comment fas-fw text-info"></i> <span class="hide-menu">Forums </span></a></li>
                    <li><a href="" class="waves-effect"><i class="fas fa-shopping-cart fas-fw text-warning"></i> <span class="hide-menu"><?= $this->lang->line('admin_m8') ?></span></a></li>
                    <li><a href="<?= base_url('admin/settings'); ?>" class="waves-effect"><i class="fas fa-wrench fas-fw text-info"></i> <span class="hide-menu"><?= $this->lang->line('admin_m9') ?></span></a></li>
                    <li class="devider"></li>
                    <li><a target="_blank" href="" class="waves-effect"><i class="fas fa-circle text-info"></i><span class="hide-menu"> Wiki</span></a></li>
                    <li><a target="_blank" href="https://github.com/sayghteight/ANetworks/issues" class="waves-effect"><i class="fas fa-circle text-inverse"></i><span class="hide-menu"> Issues</span></a></li>
                </ul>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
<!-- ============================================================== -->
