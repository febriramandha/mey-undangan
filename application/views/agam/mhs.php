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
            <div class="card-tools">
                <a href="<?= site_url('rekapitulasi/add'); ?>" class="btn btn-primary" data-toggle="modal" data-target="#ModalaAdd">
                    <i class="fas fa-plus"></i> Tambah
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="card-body table-responsive p-0">
                <div id="reload">
                    <table class="table table-striped" id="mydata">
                        <thead>
                            <tr>
                                <th>NIM</th>
                                <th>NAMA</th>
                                <th>JURUSAN</th>
                                <th style="text-align: right;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody id="show_data">

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
</section>

<!-- MODAL ADD -->
<div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Tambah Mahasiswa</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3">NIM</label>
                        <div class="col-xs-9">
                            <input name="nim" id="nim" class="form-control" type="text" placeholder="NIM" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3">Nama Mahasiswa</label>
                        <div class="col-xs-9">
                            <input name="nama" id="nama" class="form-control" type="text" placeholder="Nama Mahasiswa" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3">Jurusan</label>
                        <div class="col-xs-9">
                            <input name="jurusan" id="jurusan" class="form-control" type="text" placeholder="Jurusan" style="width:335px;" required>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_simpan">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--END MODAL ADD-->

<!-- MODAL EDIT -->
<div class="modal fade" id="ModalaEdit" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Edit Mahasiswa</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3">NIM</label>
                        <div class="col-xs-9">
                            <input name="nim_edit" id="nim2" class="form-control" type="text" placeholder="NIM" style="width:335px;" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3">Nama</label>
                        <div class="col-xs-9">
                            <input name="nama_edit" id="nama2" class="form-control" type="text" placeholder="Nama" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3">Jurusan</label>
                        <div class="col-xs-9">
                            <input name="jurusan_edit" id="jurusan2" class="form-control" type="text" placeholder="Jurusan" style="width:335px;" required>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_update">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--END MODAL EDIT-->

<!--MODAL HAPUS-->
<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                <h4 class="modal-title" id="myModalLabel">Hapus Mahasiswa</h4>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

                    <input type="hidden" name="nim" id="textnim" value="">
                    <div class="alert alert-warning">
                        <p>Apakah Anda yakin mau memhapus Mahasiswa ini?</p>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--END MODAL HAPUS-->

<script type="text/javascript">
    $(document).ready(function() {
        tampil_data_mhs(); //pemanggilan fungsi tampil barang.

        $('#mydata').dataTable();

        //fungsi tampil barang
        function tampil_data_mhs() {
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url() ?>agam/data_mahasiswa',
                async: true,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td>' + data[i].nim + '</td>' +
                            '<td>' + data[i].nama + '</td>' +
                            '<td>' + data[i].jurusan + '</td>' +
                            '<td style="text-align:right;">' +
                            '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="' + data[i].nim + '">Edit</a>' + ' ' +
                            '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="' + data[i].nim + '">Hapus</a>' +
                            '</td>' +
                            '</tr>';
                    }
                    $('#show_data').html(html);
                }

            });
        }

        //GET UPDATE
        $('#show_data').on('click', '.item_edit', function() {
            var nim = $(this).attr('data');
            $.ajax({
                type: "GET",
                url: "<?php echo base_url('agam/get_mahasiswa') ?>",
                dataType: "JSON",
                data: {
                    nim: nim
                },
                success: function(data) {
                    $.each(data, function(nim, nama, jurusan) {
                        $('#ModalaEdit').modal('show');
                        $('[name="nim_edit"]').val(data.nim);
                        $('[name="nama_edit"]').val(data.nama);
                        $('[name="jurusan_edit"]').val(data.jurusan);
                    });
                }
            });
            return false;
        });


        //GET HAPUS
        $('#show_data').on('click', '.item_hapus', function() {
            var id = $(this).attr('data');
            $('#ModalHapus').modal('show');
            $('[name="nim"]').val(id);
        });

        //Simpan Barang
        $('#btn_simpan').on('click', function() {
            var nim = $('#nim').val();
            var nama = $('#nama').val();
            var jurusan = $('#jurusan').val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('agam/simpan_mahasiswa') ?>",
                dataType: "JSON",
                data: {
                    nim: nim,
                    nama: nama,
                    jurusan: jurusan
                },
                success: function(data) {
                    $('[name="nim"]').val("");
                    $('[name="nama"]').val("");
                    $('[name="jurusan"]').val("");
                    $('#ModalaAdd').modal('hide');
                    tampil_data_mhs();
                }
            });
            return false;
        });

        //Update Barang
        $('#btn_update').on('click', function() {
            var nim = $('#nim2').val();
            var nama = $('#nama2').val();
            var jurusan = $('#jurusan2').val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('agam/update_mahasiswa') ?>",
                dataType: "JSON",
                data: {
                    nim: nim,
                    nama: nama,
                    jurusan: jurusan
                },
                success: function(data) {
                    $('[name="nim_edit"]').val("");
                    $('[name="nama_edit"]').val("");
                    $('[name="jurusan_edit"]').val("");
                    $('#ModalaEdit').modal('hide');
                    tampil_data_mhs();
                }
            });
            return false;
        });

        //Hapus Barang
        $('#btn_hapus').on('click', function() {
            var nim = $('#textnim').val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('agam/hapus_mahasiswa') ?>",
                dataType: "JSON",
                data: {
                    nim: nim
                },
                success: function(data) {
                    $('#ModalHapus').modal('hide');
                    tampil_data_mhs();
                }
            });
            return false;
        });

    });
</script>