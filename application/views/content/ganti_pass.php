<?php
$pass_baru = array(
    'class' => 'form-control',
    'name' => 'pass_baru',
    'type' => 'password',
    'id' => 'pass_baru',
    'value' => set_value('pass_baru'),
    'placeholder' => 'Masukkan Password Baru'
);

$confirm_pass_baru = array(
    'class' => 'form-control',
    'name' => 'confirm_pass_baru',
    'type' => 'password',
    'id' => 'confirm_pass_baru',
    'value' => set_value('confirm_pass_baru'),
    'placeholder' => 'Konfirmasi Password Baru'
);

$submit = array(
    'class' => 'btn btn-success btn-fw'
);

?>
<div class="container">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card mb-3">
                <div class="card-body">
                    <?= form_open(); ?>
                    <div class="form-group">
                        <?= form_label('Password Baru', 'pass_baru'); ?>
                        <?= form_input($pass_baru); ?>
                        <?= "<small class='form-text text-danger'>" . form_error('pass_baru') . "</small>"; ?>
                    </div>
                    <div class="form-group">
                        <?= form_label('Konfirmasi Password', 'confirm_pass_baru'); ?>
                        <?= form_input($confirm_pass_baru); ?>
                        <?= "<small class='form-text text-danger'>" . form_error('confirm_pass_baru') . "</small>"; ?>
                    </div>
                    <div class="form-group">
                        <?= form_submit('submit', 'Ubah Password!', $submit); ?>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>