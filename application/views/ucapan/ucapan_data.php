<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Ucapan
                    <small>Tamu Undangan</small>
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#"><i class="nav-icon fas fa-tachometer-alt"></i></a></li>
                    <li class="breadcrumb-item active">Ucapan</li>
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
            <h3 class="card-title">Ucapan Tamu Undangan</h3>
        </div>
        <div class="card-body">
            <div class="card-body table-responsive p-0">
                <table class="table table-bordered table-hover text-nowrap table-head-fixed" id="table1">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Nama Tamu</th>
                            <th>Kehadiran</th>
                            <th>Ucapan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($row->result() as $key => $data) { ?>
                            <tr>
                                <td><?= $no++; ?>.</td>
                                <td><?= $data->nm_invite; ?></td>
                                <td><?= $data->kehadiran; ?></td>
                                <td><?= $data->ucapan; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>