<?php
$nama = array(
    'class' => 'form-control',
    'name' => 'nama_dokter',
    'id' => 'nama_dokter',
    'value' => $dokter['nama_dokter'],
    'placeholder' => 'Masukkan Nama Dokter'
);

$jekel = array(
    'class' => 'custom-select',
    'id' => 'jenis_kelamin'
);


$umur = array(
    'class' => 'form-control',
    'name' => 'umur',
    'type' => 'number',
    'id' => 'umur',
    'value' => $dokter['umur'],
    'placeholder' => 'Masukkan Umur'
);

$str = array(
    'class' => 'form-control',
    'name' => 'str',
    'id' => 'str',
    'value' => $dokter['str'],
    'placeholder' => 'Masukkan STR'
);

$ijin_praktek = array(
    'class' => 'form-control',
    'name' => 'ijin_praktek',
    'id' => 'ijin_praktek',
    'value' => $dokter['ijin_praktek'],
    'placeholder' => 'Masukkan Ijin Praktek'
);

$alamat = array(
    'class' => 'form-control',
    'name' => 'alamat',
    'id' => 'alamat',
    'value' => $dokter['alamat'],
    'placeholder' => 'Masukkan Alamat'
);

$options = array(
    'L' => 'Laki - Laki',
    'P' => 'Perempuan'
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
                    <?= form_hidden('id_dokter', $dokter['id_dokter']); ?>
                    <div class="form-group">
                        <?= form_label('Nama Dokter Hewan', 'nama_dokter'); ?>
                        <?= form_input($nama) ?>
                        <?= "<small class='form-text text-danger'>" . validation_errors() . "</small>"; ?>
                    </div>
                    <div class="form-group">
                        <?= form_label('Jenis Kelamin', 'jenis_kelamin'); ?>
                        <?= form_dropdown('jenis_kelamin', $options, $dokter['jenis_kelamin'], $jekel) ?>
                        <?= "<small class='form-text text-danger'>" . validation_errors() . "</small>"; ?>
                    </div>
                    <div class="form-group">
                        <?= form_label('Umur', 'umur'); ?>
                        <?= form_input($umur) ?>
                        <?= "<small class='form-text text-danger'>" . validation_errors() . "</small>"; ?>
                    </div>
                    <div class="form-group">
                        <?= form_label('STR', 'str'); ?>
                        <?= form_input($str) ?>
                        <?= "<small class='form-text text-danger'>" . validation_errors() . "</small>"; ?>
                    </div>
                    <div class="form-group">
                        <?= form_label('Ijin Praktek', 'ijin_praktek'); ?>
                        <?= form_input($ijin_praktek) ?>
                        <?= "<small class='form-text text-danger'>" . validation_errors() . "</small>"; ?>
                    </div>
                    <div class="form-group">
                        <?= form_label('Alamat', 'alamat'); ?>
                        <?= form_textarea($alamat) ?>
                        <?= "<small class='form-text text-danger'>" . validation_errors() . "</small>"; ?>
                    </div>
                    <div class="form-group">
                        <?= form_submit('submit', 'Edit Data!', $submit); ?>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>