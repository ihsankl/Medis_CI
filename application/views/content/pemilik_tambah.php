<?php

$label = array(
    'class' => 'col-sm-2 col-form-label'
);

$input_nama = array(
    'class' => 'form-control',
    'placeholder' => 'Nama Pemilik',
    'name' => 'nama_pemilik',
    'value' => set_value('nama_pemilik')
);

$input_alamat = array(
    'class' => 'form-control',
    'placeholder' => 'Alamat',
    'name' => 'alamat',
    'value' => set_value('alamat')
);

$input_hp = array(
    'type' => 'number',
    'class' => 'form-control',
    'placeholder' => 'No. HP',
    'name' => 'nohp',
    'value' => set_value('nohp')
);

$input_regis = array(
    'class' => 'form-control',
    'placeholder' => 'No. Regis',
    'name' => 'nomor_reg',
    'value' => set_value('nomor_reg')
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
                    <div class="form-group row">
                        <?= form_label('Nama Pemilik : ', 'nama_pemilik', $label); ?>
                        <div class="col-sm-10">
                            <?= form_input($input_nama); ?>
                            <?= "<small class='form-text text-danger'>" . form_error('nama_pemilik') . "</small>"; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <?= form_label('Alamat : ', 'alamat', $label); ?>
                        <div class="col-sm-10">
                            <?= form_textarea($input_alamat); ?>
                            <?= "<small class='form-text text-danger'>" . form_error('alamat') . "</small>"; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <?= form_label('No. HP : ', 'nohp', $label); ?>
                        <div class="col-sm-10">
                            <?= form_input($input_hp); ?>
                            <?= "<small class='form-text text-danger'>" . form_error('nohp') . "</small>"; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <?= form_label('No. Regis : ', 'nomor_reg', $label); ?>
                        <div class="col-sm-10">
                            <?= form_input($input_regis); ?>
                            <?= "<small class='form-text text-danger'>" . form_error('nomor_reg') . "</small>"; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">

                        </div>
                        <div class="col-sm-10">
                            <?= form_submit('submit', 'Masukkan Data!', $submit) ?>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>