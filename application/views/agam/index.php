<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>AGAM
                    <small>Kabupaten</small>
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#"><i class="nav-icon fas fa-tachometer-alt"></i></a></li>
                    <li class="breadcrumb-item active">AGAM</li>
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
            <h3 class="card-title">Kabupaten Agam</h3>
        </div>
        <!-- <div class="card-body">
            <div class="card-body table-responsive p-0"> -->
        <?php
        // echo "<pre>";
        // print_r($kabko);
        ?>

        <!-- <table class="table table-bordered table-hover text-nowrap table-head-fixed" id="table1">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Kode Prov</th>
                            <th>Nama Prov</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($prov as $data) { ?>
                            <tr>
                                <td><?= $no++; ?>.</td>
                                <td><?= $data['id']; ?></td>
                                <td><?= $data['nama']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table> -->


        <!-- </div>
            
        </div> -->
    </div>

    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="<?= site_url('agam/mhs'); ?>" class="nav-link">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <h3>Mahasiswa</h3>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>

<script>
    // function reverseString(str) {
    //     return str;
    // }
    // console.log(reverseString('hello'));

    function reverseString(str) {
        return str.split('').reverse().join('');
    }
    console.log(reverseString('nama'));
    alert(reverseString('nama'));
</script>