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
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><?= ucfirst($page); ?> Invite</h3>
            <div class="card-tools">
                <a href="<?= site_url('invite'); ?>" class="btn btn-warning">
                    <i class="fas fa-undo"></i> Back
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <form action="<?= site_url('invite/process'); ?>" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Undangan *</label>
                                <input type="hidden" name="caten" value="<?= $this->fungsi->user_login()->name; ?>">
                                <input type="hidden" name="url_invite" value="<?= $this->fungsi->user_login()->url_undangan; ?>">
                                <input type="text" class="form-control" id="nm_invite" name="nm_invite" placeholder="Input Nama Undangan" autocomplete="off" autofocus required>
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