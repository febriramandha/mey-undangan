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
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add Users</h3>
            <div class="card-tools">
                <a href="<?= site_url('user'); ?>" class="btn btn-warning">
                    <i class="fas fa-undo"></i> Back
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <form action="<?= site_url('user/process'); ?>" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Jenis Undangan *</label>
                                <select class="form-control" name="jenis_undangan" id="jenis_undangan">
                                    <option selected disabled>- Pilih -</option>
                                    <option value="1" <?= set_value('jenis_undangan') == 1 ? "selected" : null; ?>>Pernikahan</option>
                                    <option value="2" <?= set_value('jenis_undangan') == 2 ? "selected" : null; ?>>Aqiqah</option>
                                    <option value="3" <?= set_value('jenis_undangan') == 2 ? "selected" : null; ?>>Ulang Tahun</option>
                                </select>
                                <?= form_error('jenis_undangan'); ?>
                            </div>
                            <div class="form-group">
                                <label>Nama *</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name'); ?>" placeholder="Input Nama" autocomplete="off" autofocus>
                            </div>
                            <div class="form-group">
                                <label>Username *</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?= set_value('username'); ?>" placeholder="Input Username" autocomplete="off">
                                <?= form_error('username'); ?>
                            </div>
                            <div class="form-group">
                                <label>Password *</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Input Password" autocomplete="off">
                                <?= form_error('password'); ?>
                            </div>
                            <div class="form-group">
                                <label>Ulangi Password *</label>
                                <input type="password" class="form-control" id="passconf" name="passconf" placeholder="Input Password" autocomplete="off">
                                <?= form_error('passconf'); ?>
                            </div>
                            <div class="form-group" id="form_caten_pr">
                                <label>Caten Perempuan *</label>
                                <input type="text" class="form-control" id="caten_pr" name="caten_pr" value="<?= set_value('caten_pr'); ?>" placeholder="Input Caten Perempuan" autocomplete="off">
                            </div>
                            <div class="form-group" id="form_caten_lk">
                                <label>Caten Laki-laki *</label>
                                <input type="text" class="form-control" id="caten_lk" name="caten_lk" value="<?= set_value('caten_lk'); ?>" placeholder="Input Caten Laki-laki" autocomplete="off">
                            </div>
                            <div class="form-group" id="form_nm_anak" style="display: none;">
                                <label>Nama Anak *</label>
                                <input type="text" class="form-control" id="nm_anak" name="nm_anak" value="<?= set_value('nm_anak'); ?>" placeholder="Input Nama Anak" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" name="address"><?= set_value('address'); ?></textarea>
                                <?= form_error('addres'); ?>
                            </div>
                            <div class="form-group">
                                <label>URL Undangan *</label>
                                <input type="text" class="form-control" id="url_undangan" name="url_undangan" value="<?= set_value('url_undangan'); ?>" placeholder="Input URL Undangan" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Level *</label>
                                <select class="form-control" name="level">
                                    <option value="">- Pilih -</option>
                                    <option value="1" <?= set_value('level') == 1 ? "selected" : null; ?>>Admin</option>
                                    <option value="2" <?= set_value('level') == 2 ? "selected" : null; ?>>Customer</option>
                                </select>
                                <?= form_error('level'); ?>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="<?= $page; ?>" class="btn btn-success">Save</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $("#jenis_undangan").change(function() {
            var vUndangan = $("#jenis_undangan").val();

            if (vUndangan == "1") {
                $('#form_nm_anak').hide();
                $('#form_caten_pr').show();
                $('#form_caten_lk').show();
            } else if (vUndangan == "2" || vUndangan == "3") {
                $('#form_nm_anak').show();
                $('#form_caten_pr').hide();
                $('#form_caten_lk').hide();
            }
        });
    });
</script>