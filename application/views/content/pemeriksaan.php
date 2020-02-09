<?php

function tgl_indo($tgl)
{

    $tanggal = substr($tgl, 8, 2);
    $bulan = getBulan(substr($tgl, 5, 2));
    $tahun = substr($tgl, 0, 4);
    return $tanggal . ' ' . $bulan . ' ' . $tahun;
}

function getBulan($bln)
{

    switch ($bln) {
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}

$cari = array(
    'name' => 'cari_pemilik',
    'class' => 'form-control',
    'id' => 'ajax_search',
    'placeholder' => 'Cari Berdasarkan Nama Pemilik/ No. Regis'

);

$submit = array(
    'class' => 'btn btn-sm btn-info',
    'name' => 'cari',
    'value' => 'Cari'
);


?>
    <div class="row">
        <div class="col-md-3 mb-3">
            <a href="<?= base_url(); ?>Pemeriksaan/tambah" class="btn btn-outline-primary btn-block"><i class="mdi mdi-library-plus"></i> Tambah</a>
        </div>
        <div class="col-md-9">
            <?= form_open('Pemeriksaan'); ?>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Cari :</span>
                    </div>
                    <?= form_input($cari); ?>
                    <div class="input-group-append">
                        <button class="btn btn-sm btn-gradient-primary" type="submit" id="btn-search">Cari</button>
                    </div>
                </div>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
    <div class="row">
        <?php if ($this->session->flashdata('tambah')) : ?>
            <div class="container my-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Data berhasil <strong><?= $this->session->flashdata('tambah'); ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('edit')) : ?>
            <div class="container my-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Data berhasil <strong><?= $this->session->flashdata('edit'); ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div id="view">
        <?php foreach ($pemilik as $keyPemilik => $valuePemilik) : ?>
            <button class="btn btn-primary btn-block mt-2" type="button" data-toggle="collapse" data-target="#data<?= $valuePemilik['id_pemilik']; ?>" aria-expanded="false" aria-controls="<?= $valuePemilik['id_pemilik']; ?>">
                <span class="float-left">Pemilik: <?= $valuePemilik['nama_pemilik']; ?></span>
            </button>

            <div class="collapse" id="data<?= $valuePemilik['id_pemilik']; ?>">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card my-3">
                        <div class="card card-body">
                            <?php $cek = 1; ?>
                            <?php foreach ($pemeriksaan as $keyPemeriksaan => $valuePemeriksaan) : ?>
                                <?php if ($valuePemilik['id_pemilik'] == $valuePemeriksaan['id_pemilik'] && $cek <= 5) : ?>
                                    <small class="text-muted"><?= $valuePemeriksaan['nomor_reg']; ?></small>
                                    <table class="table table-hover table-dark mb-3">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Tanggal Pemeriksaan</th>
                                                <td> :</td>
                                                <td><?= tgl_indo($valuePemeriksaan['tanggal']); ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Nama Lengkap Pemilik</th>
                                                <td> :</td>
                                                <td><?= $valuePemeriksaan['nama_pemilik']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Alamat</th>
                                                <td> :</td>
                                                <td class="text-justify"><?= $valuePemeriksaan['alamat']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Nama Hewan</th>
                                                <td> :</td>
                                                <td class="text-justify"><?= $valuePemeriksaan['nama_hewan']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Jenis Hewan</th>
                                                <td> :</td>
                                                <td class="text-justify"><?= $valuePemeriksaan['jenis_hewan']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Ras Hewan</th>
                                                <td> :</td>
                                                <td class="text-justify"><?= $valuePemeriksaan['ras_hewan']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Berat Hewan</th>
                                                <td> :</td>
                                                <td class="text-justify"><?= $valuePemeriksaan['berat_badan']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Kelamin</th>
                                                <td> :</td>
                                                <td class="text-justify"><?php $kelamin = ($valuePemeriksaan['kelamin'] == "Jantan") ? "<i class='mdi mdi-gender-male'></i>" : "<i class='mdi mdi-gender-female'></i>";
                                                                                        echo $kelamin; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Umur</th>
                                                <td> :</td>
                                                <td class="text-justify"><?= $valuePemeriksaan['umur']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Anamnesa</th>
                                                <td> :</td>
                                                <td class="text-justify"><?= $valuePemeriksaan['anamnesa']; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    <b><a class="" style="color: #FFFFFF;" data-toggle="collapse" href=".multi-collapse<?= $valuePemeriksaan['id_pemeriksaan']; ?>" role="button" aria-expanded="false" aria-controls="gejala<?= $valuePemeriksaan['id_pemeriksaan']; ?>1 gejala<?= $valuePemeriksaan['id_pemeriksaan']; ?>2 gejala<?= $valuePemeriksaan['id_pemeriksaan']; ?>3 gejala<?= $valuePemeriksaan['id_pemeriksaan']; ?>4 gejala<?= $valuePemeriksaan['id_pemeriksaan']; ?>5">
                                                            + Gejala Klinis
                                                        </a></b>
                                                </td>
                                            </tr>
                                            <tr class="collapse multi-collapse<?= $valuePemeriksaan['id_pemeriksaan']; ?>" id="gejala<?= $valuePemeriksaan['id_pemeriksaan']; ?>1">
                                                <td scope="row">&emsp;Suhu</td>
                                                <td> :</td>
                                                <td class="text-justify"><?= $valuePemeriksaan['suhu']; ?> &#8451;</td>
                                            </tr>
                                            <tr class="collapse multi-collapse<?= $valuePemeriksaan['id_pemeriksaan']; ?>" id="gejala<?= $valuePemeriksaan['id_pemeriksaan']; ?>2">
                                                <td scope="row">&emsp;Pulsus</td>
                                                <td> :</td>
                                                <td class="text-justify"><?= $valuePemeriksaan['pulsus']; ?></td>
                                            </tr>
                                            <tr class="collapse multi-collapse<?= $valuePemeriksaan['id_pemeriksaan']; ?>" id="gejala<?= $valuePemeriksaan['id_pemeriksaan']; ?>2">
                                                <td scope="row">&emsp;Respirasi</td>
                                                <td> :</td>
                                                <td class="text-justify"><?= $valuePemeriksaan['respirasi']; ?></td>
                                            </tr>
                                            <tr class="collapse multi-collapse<?= $valuePemeriksaan['id_pemeriksaan']; ?>" id="gejala<?= $valuePemeriksaan['id_pemeriksaan']; ?>3">
                                                <td scope="row">&emsp;Turgor Kulit</td>
                                                <td> :</td>
                                                <td class="text-justify"><?= $valuePemeriksaan['turgor_kulit']; ?></td>
                                            </tr>
                                            <tr class="collapse multi-collapse<?= $valuePemeriksaan['id_pemeriksaan']; ?>" id="gejala<?= $valuePemeriksaan['id_pemeriksaan']; ?>4">
                                                <td scope="row">&emsp;Selaput Lendir</td>
                                                <td> :</td>
                                                <td class="text-justify"><?= $valuePemeriksaan['selaput_lendir']; ?></td>
                                            </tr>
                                            <tr class="collapse multi-collapse" id="gejala<?= $valuePemeriksaan['id_pemeriksaan']; ?>5">
                                                <td scope="row">&emsp;Diagnosa</td>
                                                <td> :</td>
                                                <td class="text-justify"><?= $valuePemeriksaan['diagnosa']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Diagnosa</th>
                                                <td> :</td>
                                                <td class="text-justify"><?= $valuePemeriksaan['diagnosa']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Terapi</th>
                                                <td> :</td>
                                                <td class="text-justify"><?= $valuePemeriksaan['terapi']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Petugas yang Melayani</th>
                                                <td> :</td>
                                                <td class="text-justify"><?= $valuePemeriksaan['nama_dokter']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" colspan="3">
                                                    <div class="row">
                                                        <div class="col-md-3">

                                                        </div>
                                                        <div class="col-md-6">
                                                            <center><a href="<?= base_url(); ?>Pemeriksaan/ubah/<?= $valuePemeriksaan['id_pemeriksaan']; ?>/<?= $valuePemeriksaan['id_dokter']; ?>/<?= $valuePemeriksaan['id_pemilik']; ?>/<?= $valuePemeriksaan['id_status']; ?>" class="btn btn-light btn-block">Update</a></center>
                                                        </div>
                                                        <div class="col-md-3">

                                                        </div>
                                                    </div>
                                                </th>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php $cek++;
                                        endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
    <!-- END DIV -->