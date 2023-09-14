<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>User
                    <small>Pengguna</small>
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#"><i class="nav-icon fas fa-tachometer-alt"></i></a></li>
                    <li class="breadcrumb-item active">User</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">

    <?php $this->view('messages'); ?>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Users</h3>
            <div class="card-tools">
                <a href="<?= site_url('user/add'); ?>" class="btn btn-primary">
                    <i class="fas fa-user-plus"></i> Create User
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="card-body table-responsive p-0">
                <table class="table table-bordered table-hover text-nowrap table-head-fixed" id="table1">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($row->result() as $key => $data) { ?>
                            <tr>
                                <td><?= $no++; ?>.</td>
                                <td><?= $data->username; ?></td>
                                <td><?= $data->name; ?></td>
                                <td><?= $data->address; ?></td>
                                <td><?= $data->level == 1 ? "Admin" : "Customer"; ?></td>
                                <td class="text-center" width="160px">
                                    <a href="<?= site_url('user/edit/' . $data->user_id); ?>" class="btn btn-warning btn-xs">
                                        <i class="fas fa-pen"></i> Edit
                                    </a>
                                    <a href="<?= site_url('user/delete/' . $data->user_id); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda yakin ingin hapus?')">
                                        <i class="fas fa-trash"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>