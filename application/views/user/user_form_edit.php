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
            <h3 class="card-title">Edit Users</h3>
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
                                    <?php $jenis_undangan = $this->input->post('jenis_undangan') ?? $row->jenis_undangan ?>
                                    <option selected disabled>- Pilih -</option>
                                    <option value="1" <?= $jenis_undangan == 1 ? 'selected' : null; ?>>Pernikahan</option>
                                    <option value="2" <?= $jenis_undangan == 2 ? 'selected' : null; ?>>Aqiqah</option>
                                    <option value="3" <?= $jenis_undangan == 3 ? 'selected' : null; ?>>Ulang Tahun</option>
                                </select>
                                <?= form_error('jenis_undangan'); ?>
                            </div>
                            <div class="form-group">
                                <label>Nama *</label>
                                <input type="hidden" name="user_id" value="<?= $row->user_id; ?>">
                                <input type="text" class="form-control" id="fullname" name="fullname" value="<?= $this->input->post('fullname') ?? $row->name; ?>" placeholder="Input Nama" autocomplete="off" autofocus>
                                <?= form_error('fullname'); ?>
                            </div>
                            <div class="form-group">
                                <label>Username *</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?= $this->input->post('username') ?? $row->username; ?>" placeholder="Input Username" autocomplete="off">
                                <?= form_error('username'); ?>
                            </div>
                            <div class="form-group">
                                <label>Password</label> <small>(Biarkan kosong jika tidak diganti)</small>
                                <input type="password" class="form-control" id="password" name="password" value="<?= $this->input->post('password'); ?>" placeholder="Input Password" autocomplete="off">
                                <?= form_error('password'); ?>
                            </div>
                            <div class="form-group">
                                <label>Ulangi Password</label> <small>(Biarkan kosong jika tidak diganti)</small>
                                <input type="password" class="form-control" id="passconf" name="passconf" value="<?= $this->input->post('passconf'); ?>" placeholder="Input Password" autocomplete="off">
                                <?= form_error('passconf'); ?>
                            </div>
                            <div class="form-group" id="form_caten_pr">
                                <label>Caten Perempuan *</label>
                                <input type="text" class="form-control" id="caten_pr" name="caten_pr" value="<?= $this->input->post('caten_pr') ?? $row->caten_pr; ?>" placeholder="Input Caten Perempuan" autocomplete="off">
                                <?= form_error('caten_pr'); ?>
                            </div>
                            <div class="form-group" id="form_caten_lk">
                                <label>Caten Laki-laki *</label>
                                <input type="text" class="form-control" id="caten_lk" name="caten_lk" value="<?= $this->input->post('caten_lk') ?? $row->caten_lk; ?>" placeholder="Input Caten Laki-laki" autocomplete="off">
                                <?= form_error('caten_lk'); ?>
                            </div>
                            <div class="form-group" id="form_nm_anak">
                                <label>Nama Anak *</label>
                                <input type="text" class="form-control" id="nm_anak" name="nm_anak" value="<?= $this->input->post('nm_anak') ?? $row->nm_anak; ?>" placeholder="Input Nama Anak" autocomplete="off">
                                <?= form_error('nm_anak'); ?>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" name="address"><?= $this->input->post('address') ?? $row->address; ?></textarea>
                                <?= form_error('addres'); ?>
                            </div>
                            <div class="form-group">
                                <label>URL Undangan *</label>
                                <input type="text" class="form-control" id="url_undangan" name="url_undangan" value="<?= $this->input->post('url_undangan') ?? $row->url_undangan; ?>" placeholder="Input URL Undangan" autocomplete="off">
                                <?= form_error('url_undangan'); ?>
                            </div>
                            <div class="form-group">
                                <label>Level</label>
                                <select class="form-control" name="level">
                                    <?php $level = $this->input->post('level') ?? $row->level ?>
                                    <option value="1">Admin</option>
                                    <option value="2" <?= $level == 2 ? 'selected' : null; ?>>Customer</option>
                                </select>
                                <?= form_error('level'); ?>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success" name="edit">Edit</button>
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
        jUndangan();

        $("#jenis_undangan").change(function() {
            jUndangan();
        });
    });

    function jUndangan() {
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
    }
</script>