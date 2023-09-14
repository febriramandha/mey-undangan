<?php if ($this->session->has_userdata('pesan')) { ?>
    <div class="row">
        <div class="col-sm-6">
            <div class="alert alert-success" role="alert">
                <i class="fas fa-check"></i> <?= $this->session->flashdata('pesan'); ?>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($this->session->has_userdata('error')) { ?>
    <div class="row">
        <div class="col-sm-6">
            <div class="alert alert-danger" role="alert">
                <i class="fas fa-ban"></i> <?= $this->session->flashdata('error'); ?>
            </div>
        </div>
    </div>
<?php } ?>