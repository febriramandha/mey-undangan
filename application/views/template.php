<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $judul_site; ?></title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url('assets/AdminLTE/'); ?>plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('assets/AdminLTE/'); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/AdminLTE/'); ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/AdminLTE/'); ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/AdminLTE/'); ?>dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed <?= $this->uri->segment(1) == 'sale' ? 'sidebar-collapse' : null; ?>">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light navbar-fixed">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user"></i>
                        <span><?= $this->fungsi->user_login()->name; ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-2">
                        <div class="text-center p-3">
                            <img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/AdminLTE/'); ?>dist/img/user1-128x128.jpg" alt="User profile">
                            <h3 class="profile-username text-center"><?= $this->fungsi->user_login()->name; ?></h3>
                            <p class="text-muted text-center"><?= $this->fungsi->user_login()->username; ?></p>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a href="<?= site_url('auth/logout'); ?>" class="btn btn-primary btn-block">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= site_url(''); ?>" class="brand-link text-center">
                <h5 class="brand-text font-weight-light"><b>MEY</b> Undangan</h5>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('assets/AdminLTE/'); ?>dist/img/user1-128x128.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= $this->fungsi->user_login()->name; ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-header">MAIN NAVIGATION</li>
                        <li class="nav-item">
                            <a href="<?= site_url(''); ?>" class="nav-link <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('invite'); ?>" class="nav-link <?= $this->uri->segment(1) == 'invite' ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Invite
                                </p>
                            </a>
                        </li>
                        <?php if ($this->fungsi->user_login()->level == 1) { ?>
                            <li class="nav-item">
                                <a href="<?= site_url('ucapan'); ?>" class="nav-link <?= $this->uri->segment(1) == 'ucapan' ? 'active' : ''; ?>">
                                    <i class="nav-icon fas fa-comments"></i>
                                    <p>
                                        Ucapan
                                    </p>
                                </a>
                            </li>

                            <li class="nav-header">SETTING</li>
                            <li class="nav-item">
                                <a href="<?= site_url('user'); ?>" class="nav-link <?= $this->uri->segment(1) == 'user' ? 'active' : ''; ?>">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>Users</p>
                                </a>
                            </li>

                            <!-- <li class="nav-header">TESTING</li>
                            <li class="nav-item">
                                <a href="<?= site_url('api'); ?>" class="nav-link <?= $this->uri->segment(1) == 'api' ? 'active' : ''; ?>">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>API</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('agam'); ?>" class="nav-link <?= $this->uri->segment(1) == 'agam' ? 'active' : ''; ?>">
                                    <i class="nav-icon fas fa-list"></i>
                                    <p>AGAM</p>
                                </a>
                            </li> -->
                        <?php } ?>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <script src="<?= base_url('assets/AdminLTE/'); ?>plugins/jquery/jquery.min.js"></script>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?= $contents; ?>
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer text-center">
            <strong>Copyright &copy; 2021 - <?= date('Y'); ?> | by MEY Undangan Digital.</strong>
        </footer>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url('assets/AdminLTE/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/AdminLTE/'); ?>dist/js/adminlte.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?= base_url('assets/AdminLTE/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/AdminLTE/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/AdminLTE/'); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('assets/AdminLTE/'); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/AdminLTE/'); ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('assets/AdminLTE/'); ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/AdminLTE/'); ?>plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url('assets/AdminLTE/'); ?>plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url('assets/AdminLTE/'); ?>plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url('assets/AdminLTE/'); ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url('assets/AdminLTE/'); ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url('assets/AdminLTE/'); ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table1').DataTable()
        });
    </script>
</body>

</html>