<?php

$id_dokter = $this->uri->segment(4);

$pemilik_input = array(
    'class' => 'form-control',
    'name' => '',
    'id' => 'nama_pemilik',
    'readonly' => '',
    'value' => $pemilik['nama_pemilik'],
    'placeholder' => 'Masukkan Anamnesa'
);

$nama_hewan = array(
    'class' => 'form-control',
    'name' => '',
    'id' => 'nama_hewan',
    'readonly' => '',
    'value' => $hewan['nama_hewan'],
    'placeholder' => 'Masukkan Nama Hewan'
);

$anamnesa = array(
    'class' => 'form-control',
    'name' => 'anamnesa',
    'id' => 'anamnesa',
    'value' => $pemeriksaan['anamnesa'],
    'placeholder' => 'Masukkan Anamnesa'
);

$suhu = array(
    'class' => 'form-control',
    'name' => 'suhu',
    'id' => 'suhu',
    'type' => 'number',
    'value' => $pemeriksaan['suhu'],
    'placeholder' => 'Masukkan Suhu (dalam derjat celcius)'
);

$pulsus = array(
    'class' => 'form-control',
    'name' => 'pulsus',
    'id' => 'pulsus',
    'value' => $pemeriksaan['pulsus'],
    'placeholder' => 'Masukkan Pulsus'
);

$respirasi = array(
    'class' => 'form-control',
    'name' => 'respirasi',
    'id' => 'respirasi',
    'value' => $pemeriksaan['respirasi'],
    'placeholder' => 'Masukkan Respirasi'
);

$turgor_kulit = array(
    'class' => 'form-control',
    'name' => 'turgor_kulit',
    'id' => 'turgor_kulit',
    'value' => $pemeriksaan['turgor_kulit'],
    'placeholder' => 'Masukkan Turgor Kulit'
);

$selaput_lendir = array(
    'class' => 'form-control',
    'name' => 'selaput_lendir',
    'id' => 'selaput_lendir',
    'value' => $pemeriksaan['selaput_lendir'],
    'placeholder' => 'Masukkan Selaput Lendir'
);

$diagnosa = array(
    'class' => 'form-control',
    'name' => 'diagnosa',
    'id' => 'diagnosa',
    'value' => $pemeriksaan['diagnosa'],
    'placeholder' => 'Masukkan Diagnosa'
);

$terapi = array(
    'class' => 'form-control',
    'name' => 'terapi',
    'id' => 'terapi',
    'value' => $pemeriksaan['terapi'],
    'placeholder' => 'Masukkan Terapi'
);

$submit = array(
    'class' => 'btn btn-success btn-fw btn-block'
);

?>

<div class="container">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card mb-3">
                <div class="card-body">
                    <?= form_open(); ?>
                    <?= form_hidden('nama_pemilik', $pemilik['id_pemilik']); ?>
                    <div class="form-group">
                        <?= form_label('Pemilik Hewan', 'nama_pemilik'); ?>
                        <?= form_input($pemilik_input); ?>
                        <?= "<small class='form-text text-danger'>" . form_error('nama_pemilik') . "</small>"; ?>
                    </div>
                    <div class="form-group">
                        <?= form_hidden('nama_hewan', $hewan['id_status']); ?>
                        <?= form_label('Nama Hewan', 'nama_hewan'); ?>
                        <?= form_input($nama_hewan); ?>
                        <?= "<small class='form-text text-danger'>" . form_error('nama_hewan') . "</small>"; ?>
                    </div>
                    <div class="form-group">
                        <?= form_label('Anamnesa', 'anamnesa'); ?>
                        <?= form_input($anamnesa) ?>
                        <?= "<small class='form-text text-danger'>" . form_error('anamnesa') . "</small>"; ?>
                    </div>
                    <h4 class=""><u>Gejala Klinis</u></h4>
                    <div class="card-body">
                        <div class="form-group">
                            <?= form_label('Suhu', 'suhu'); ?>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                <?= form_input($suhu) ?>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="mdi mdi-temperature-celsius"></i></span>
                                </div>
                            </div>
                            <?= "<small class='form-text text-danger'>" . form_error('suhu') . "</small>"; ?>
                        </div>
                        <div class="form-group">
                            <?= form_label('Pulsus', 'pulsus'); ?>
                            <?= form_input($pulsus) ?>
                            <?= "<small class='form-text text-danger'>" . form_error('pulsus') . "</small>"; ?>
                        </div>
                        <div class="form-group">
                            <?= form_label('Respirasi', 'respirasi'); ?>
                            <?= form_input($respirasi) ?>
                            <?= "<small class='form-text text-danger'>" . form_error('respirasi') . "</small>"; ?>
                        </div>
                        <div class="form-group">
                            <?= form_label('Turgor Kulit', 'turgor_kulit'); ?>
                            <?= form_input($turgor_kulit) ?>
                            <?= "<small class='form-text text-danger'>" . form_error('turgor_kulit') . "</small>"; ?>
                        </div>
                        <div class="form-group">
                            <?= form_label('Selaput Lendir', 'selaput_lendir'); ?>
                            <?= form_input($selaput_lendir) ?>
                            <?= "<small class='form-text text-danger'>" . form_error('selaput_lendir') . "</small>"; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <?= form_label('Diagnosa', 'diagnosa'); ?>
                        <?= form_input($diagnosa) ?>
                        <?= "<small class='form-text text-danger'>" . form_error('diagnosa') . "</small>"; ?>
                    </div>
                    <div class="form-group">
                        <?= form_label('Terapi', 'terapi'); ?>
                        <?= form_input($terapi) ?>
                        <?= "<small class='form-text text-danger'>" . form_error('terapi') . "</small>"; ?>
                    </div>
                    <div class="form-group">
                        <?= form_label('Petugas yang menangani', 'nama_dokter'); ?>
                        <select class="custom-select" id="nama_dokter" name="nama_dokter">
                            <option value="none">--Pilih Petugas--</option>
                            <?php foreach ($dokter as $keyDokter => $valueDokter) : ?>
                                <?php if ($id_dokter == $valueDokter['id_dokter']) : ?>
                                    <option selected value="<?= $valueDokter['id_dokter']; ?>"><?= $valueDokter['nama_dokter']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $valueDokter['id_dokter']; ?>"><?= $valueDokter['nama_dokter']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <?= "<small class='form-text text-danger'>" . form_error('nama_dokter') . "</small>"; ?>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <?= form_submit('submit', 'Edit Data!', $submit); ?>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>