<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Invite
                    <small>Tamu Undangan</small>
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#"><i class="nav-icon fas fa-tachometer-alt"></i></a></li>
                    <li class="breadcrumb-item active">Invite</li>
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
            <h3 class="card-title">Data Tamu Undangan</h3>
            <div class="card-tools">
                <a href="<?= site_url('invite/add'); ?>" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Undangan
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="card-body table-responsive p-0">
                <table class="table table-bordered table-hover text-nowrap table-head-fixed" id="table1">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Nama Tamu</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($row->result() as $key => $data) {
                            include "invite_share.php";
                        ?>
                            <tr>
                                <td><?= $no++; ?>.</td>
                                <td><?= $data->nm_invite; ?></td>
                                <td class="text-center">
                                    <a href="https://wa.me/?text=<?= $share; ?>" class="btn btn-success btn-xs" target="_blank"><i class="fas fa-share"></i> Bagikan</a>
                                    <a href="<?= $url; ?>" class="btn btn-warning btn-xs" target="_blank"><i class="fas fa-eye"></i> View</a>
                                    <a href="<?= site_url('invite/delete/' . $data->id_invite); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda yakin ingin hapus?')">
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