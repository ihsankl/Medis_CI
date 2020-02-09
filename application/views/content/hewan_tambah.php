<?php

$nama_hewan = array(
    'class' => 'form-control',
    'name' => 'nama_hewan',
    'id' => 'nama_hewan',
    'value' => set_value('nama_hewan'),
    'placeholder' => 'Masukkan Nama Hewan'
);

$jenis_hewan = array(
    'class' => 'form-control',
    'name' => 'jenis_hewan',
    'id' => 'jenis_hewan',
    'value' => set_value('jenis_hewan'),
    'placeholder' => 'Masukkan Jenis Hewan'
);

$ras_hewan = array(
    'class' => 'form-control',
    'name' => 'ras_hewan',
    'id' => 'ras_hewan',
    'value' => set_value('ras_hewan'),
    'placeholder' => 'Masukkan Ras Hewan'
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
    'value' => set_value('umur'),
    'placeholder' => 'Masukkan Umur'
);

$warna_bulu = array(
    'class' => 'form-control',
    'name' => 'warna_bulu',
    'id' => 'warna_bulu',
    'value' => set_value('warna_bulu'),
    'placeholder' => 'Masukkan Warna Bulu'
);

$berat_badan = array(
    'class' => 'form-control',
    'name' => 'berat_badan',
    'id' => 'berat_badan',
    'type' => 'number',
    'value' => set_value('berat_badan'),
    'placeholder' => 'Masukkan Berat Badan'
);

$options = array(
    'J' => 'Jantan',
    'B' => 'Betina'
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
                        <?= form_label('Nama Pemilik Hewan', 'nama_pemilik'); ?>
                        <select class="custom-select" name="nama_pemilik" id="nama_pemilik">
                            <option value="none">--Pilih Pemilik--</option>
                            <?php foreach ($pemilik as $keyPemilik => $valuePemilik) : ?>
                                <option value="<?= $valuePemilik['id_pemilik']; ?>"><?= $valuePemilik['nama_pemilik']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= "<small class='form-text text-danger'>" . form_error('nama_pemilik') . "</small>"; ?>
                    </div>
                    <div class="form-group">
                        <?= form_label('Nama Hewan', 'nama_hewan'); ?>
                        <?= form_input($nama_hewan) ?>
                        <?= "<small class='form-text text-danger'>" . form_error('nama_hewan') . "</small>"; ?>
                    </div>
                    <div class="form-group">
                        <?= form_label('Jenis Hewan', 'jenis_hewan'); ?>
                        <?= form_input($jenis_hewan) ?>
                        <?= "<small class='form-text text-danger'>" . form_error('jenis_hewan') . "</small>"; ?>
                    </div>
                    <div class="form-group">
                        <?= form_label('Ras Hewan', 'ras'); ?>
                        <?= form_input($ras_hewan) ?>
                        <?= "<small class='form-text text-danger'>" . form_error('ras_hewan') . "</small>"; ?>
                    </div>
                    <div class="form-group">
                        <?= form_label('Umur', 'umur'); ?>
                        <?= form_input($umur) ?>
                        <?= "<small class='form-text text-danger'>" . form_error('umur') . "</small>"; ?>
                    </div>
                    <div class="form-group">
                        <?= form_label('Jenis Kelamin', 'jenis_kelamin'); ?>
                        <?= form_dropdown('jenis_kelamin', $options, 'J', $jekel) ?>
                        <?= "<small class='form-text text-danger'>" . form_error('jenis_kelamin') . "</small>"; ?>
                    </div>
                    <div class="form-group">
                        <?= form_label('Warna Bulu', 'warna_bulu'); ?>
                        <?= form_input($warna_bulu) ?>
                        <?= "<small class='form-text text-danger'>" . form_error('warna_bulu') . "</small>"; ?>
                    </div>
                    <div class="form-group">
                        <?= form_label('Berat Hewan', 'berat_hewan'); ?>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            </div>
                            <?= form_input($berat_badan) ?>
                            <div class="input-group-append">
                                <span class="input-group-text">Kg</span>
                            </div>
                        </div>
                        <?= "<small class='form-text text-danger'>" . form_error('berat_badan') . "</small>"; ?>
                    </div>
                    <div class="form-group">
                        <?= form_submit('submit', 'Masukkan Data!', $submit); ?>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>