<?php

$anamnesa = array(
    'class' => 'form-control',
    'name' => 'anamnesa',
    'id' => 'anamnesa',
    'value' => set_value('anamnesa'),
    'placeholder' => 'Masukkan Anamnesa'
);

$suhu = array(
    'class' => 'form-control',
    'name' => 'suhu',
    'id' => 'suhu',
    'type' => 'number',
    'value' => set_value('suhu'),
    'placeholder' => 'Masukkan Suhu (dalam derjat celcius)'
);

$pulsus = array(
    'class' => 'form-control',
    'name' => 'pulsus',
    'id' => 'pulsus',
    'value' => set_value('pulsus'),
    'placeholder' => 'Masukkan Pulsus'
);

$respirasi = array(
    'class' => 'form-control',
    'name' => 'respirasi',
    'id' => 'respirasi',
    'value' => set_value('respirasi'),
    'placeholder' => 'Masukkan Respirasi'
);

$turgor_kulit = array(
    'class' => 'form-control',
    'name' => 'turgor_kulit',
    'id' => 'turgor_kulit',
    'value' => set_value('turgor_kulit'),
    'placeholder' => 'Masukkan Turgor Kulit'
);

$selaput_lendir = array(
    'class' => 'form-control',
    'name' => 'selaput_lendir',
    'id' => 'selaput_lendir',
    'value' => set_value('selaput_lendir'),
    'placeholder' => 'Masukkan Selaput Lendir'
);

$diagnosa = array(
    'class' => 'form-control',
    'name' => 'diagnosa',
    'id' => 'diagnosa',
    'value' => set_value('diagnosa'),
    'placeholder' => 'Masukkan Diagnosa'
);

$terapi = array(
    'class' => 'form-control',
    'name' => 'terapi',
    'id' => 'terapi',
    'value' => set_value('terapi'),
    'placeholder' => 'Masukkan Terapi'
);

$submit = array(
    'class' => 'btn btn-success btn-fw btn-block'
);

?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#nama_pemilik').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo base_url(); ?>Pemeriksaan/get_nama_hewan",
                method: "POST",
                data: {
                    id: id
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id_status + '>' + data[i].nama_hewan + '</option>';
                    }
                    $('.nama_hewan').html(html);

                }
            });
        });
    });
</script>

<div class="container">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card mb-3">
                <div class="card-body">
                    <?= form_open(); ?>
                    <div class="form-group">
                        <?= form_label('Pemilik Hewan', 'nama_pemilik'); ?>
                        <select class="custom-select" id="nama_pemilik" name="nama_pemilik">
                            <option value="none" selected>--Pilih Pemilik--</option>
                            <?php foreach ($pemilik as $keyPemilik => $valuePemilik) : ?>
                                <option value="<?= $valuePemilik['id_pemilik']; ?>"><?= $valuePemilik['nama_pemilik']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= "<small class='form-text text-danger'>" . form_error('nama_pemilik') . "</small>"; ?>
                    </div>
                    <div class="form-group">
                        <?= form_label('Nama Hewan', 'nama_hewan'); ?>
                        <select name="nama_hewan" id="" class="nama_hewan custom-select">

                        </select>
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
                            <option value="none" selected>--Pilih Petugas--</option>
                            <?php foreach ($dokter as $keyDokter => $valueDokter) : ?>
                                <option value="<?= $valueDokter['id_dokter']; ?>"><?= $valueDokter['nama_dokter']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= "<small class='form-text text-danger'>" . form_error('nama_dokter') . "</small>"; ?>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <?= form_submit('submit', 'Tambah Data!', $submit); ?>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>